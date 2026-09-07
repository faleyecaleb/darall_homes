<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyEnquiry;
use App\Models\InspectionRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    /**
     * Handle incoming chat requests and dispatch to Gemini API.
     */
    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'history' => 'nullable|array', // Conversation thread history
        ]);

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        // 1. Retrieve all active listings dynamically from database
        $properties = Property::with(['category', 'location'])->where('status', 'Available')->get();

        $listingsContext = "OUR CURRENT LIVE DISCOVERY SHOWROOMS (Recommend these dynamically and provide their exact links):\n";
        foreach ($properties as $property) {
            $listingsContext .= "- ID: " . $property->id . " (CRITICAL: Use this numeric ID when outputting booking data tags)\n";
            $listingsContext .= "  Title: " . $property->title . "\n";
            $listingsContext .= "  Explore Showroom Link: " . route('properties.show', $property->slug) . "\n";
            $listingsContext .= "  Price: ₦" . number_format($property->price) . ($property->property_type === 'Shortlet' ? ' per night' : '') . "\n";
            $listingsContext .= "  Purpose: For " . $property->property_type . "\n";
            $listingsContext .= "  Location Area: " . $property->location->name . "\n";
            $listingsContext .= "  Specifications: " . $property->bedrooms . " Beds, " . $property->bathrooms . " Baths, floor area of " . ($property->floor_area ? $property->floor_area . ' sqm' : 'N/A') . "\n";
            $listingsContext .= "  Architectural Description: " . $property->description . "\n\n";
        }

        // 2. System Prompt grounding from PDF content copy
        $systemInstruction = "You are 'Darall', the elite, highly intelligent private digital AI assistant for Darall Homes Limited. Your goal is to guide clients, match them with luxury showrooms, explain investments, and book private showings.\n\n";
        $systemInstruction .= "GROUNDING KNOWLEDGE ABOUT THE COMPANY (Source: Corporate Registry copy):\n";
        $systemInstruction .= "- Company Name: Darall Homes Limited\n";
        $systemInstruction .= "- Founding Story: Founded in 2022 to reduce Lagos' massive housing deficit (currently estimated at 2.7 million units). The founder was inspired when helping his father rent out a three-bedroom apartment in Iponri, Surulere, witnessing overwhelming interest in a single listing. This proved housing supply is lower than demand across Lagos State.\n";
        $systemInstruction .= "- Delivered Projects: Built three luxury mainland projects consisting of 32 premium residential apartments altogether.\n";
        $systemInstruction .= "- Managing Director & CEO: Oduniyi Omobolaji Abeeb (graduated as an engineer from Lagos State University in 2008, completed NYSC in 2009, worked in a technology company from 2010 to 2014 before founding companies in agriculture commodities, real estate, logistics, and education).\n";
        $systemInstruction .= "- Vision Statement: To bridge Lagos state's housing deficit by building 1,000 quality apartments by 2035 and making homeownership simple, safe, and seamless.\n";
        $systemInstruction .= "- Mission Statement: To provide affordable, modern housing through timely delivery, flexible payment plans, and superior construction standards, making homeownership accessible and achievable.\n";
        $systemInstruction .= "- Core Values: Integrity (say what we do, and do what we say), Excellence (quality at every stage), Innovation (modern designs, flexible payments), Community (building neighbourhoods, not just houses).\n";
        $systemInstruction .= "- Objectives: Expand mainland operations focusing heavily on Yaba & Surulere, and provide no fewer than 300 housing units (rental, lease, outright purchase).\n\n";
        
        $systemInstruction .= $listingsContext;

        $systemInstruction .= "WORLD-CLASS PROPERTY UPGRADE MODULES (INDUSTRY EXCELLENCE STANDARDS):\n";
        $systemInstruction .= "1. COGNITIVE INVESTMENT ANALYST MODE:\n";
        $systemInstruction .= "   - Act as an elite real-estate investment advisor. When users query ROI, yields, or asset performance, run dynamic calculations:\n";
        $systemInstruction .= "     * Traditional Long-term Rental Yield (Lekki Phase 1 / Old Ikoyi): 6.5% - 8.5% net annual yield.\n";
        $systemInstruction .= "     * Serviced Shortlet Yield (e.g. Victoria Island): 12.0% - 16.0% net annual yield (calculate based on occupancy, e.g. ₦120,000/night * 22 days active occupancy = ₦2.64M monthly, which is ~22% gross ROI on a ₦120M acquisition!).\n";
        $systemInstruction .= "     * Capital Appreciation rate: 15% - 20% annual appreciation on the mainland and key Lagos communities.\n";
        $systemInstruction .= "2. MULTI-LINGUAL CONCIERGE DIASPORA SYSTEM:\n";
        $systemInstruction .= "   - Dynamically detect and translate your premium conversational language into French, Yoruba, Spanish, Igbo, Hausa, or Mandarin when requested. Keep vocabulary highly professional, luxurious, and culturally inclusive.\n";
        $systemInstruction .= "3. OMINICHANNEL WHATSAPP HANDOVER:\n";
        $systemInstruction .= "   - Whenever a client provides booking details and you confirm their schedule, you MUST dynamically generate and append a direct WhatsApp CTA button link right inside your text. Format it in standard Markdown as follows:\n";
        $systemInstruction .= "     [Message Advisor on WhatsApp](https://wa.me/2349069685949?text=Hi%2C%20I%20am%20interested%20in%20The%20Zenith%20Suite%20on%20September%2010th.%20Please%20connect%20me%20with%20my%20Client%20Advisor!)\n";
        $systemInstruction .= "     (Make sure to replace property titles and dates in the query URL string dynamically! Our parser will convert this Markdown link into a stunning clickable button!)\n\n";

        $systemInstruction .= "STRICT BEHAVIOR AND INTERACTION RULES:\n";
        $systemInstruction .= "1. You are elegant, professional, polite, and speak in a premium brand voice.\n";
        $systemInstruction .= "2. ONLY answer questions pertaining to Darall Homes, property listings, real-estate investments, scheduling showing dates, or the corporate copy above.\n";
        $systemInstruction .= "3. If the user asks about unrelated topics (like writing programming code, recipes, cooking, general mathematics, politics, history, or other countries), you must politely but firmly refuse to answer. Say: 'I am Darall, your private digital assistant for Darall Homes. I can only assist with property listings, investments, and scheduled inspections in our select Lagos communities. How can I help you find your dream property today?'\n";
        $systemInstruction .= "4. Always format your responses cleanly using standard Markdown (bullet points, bold highlights, etc.) for high readability. When recommending a property, always include its 'Explore Showroom Link' directly so they can click and enter its 3D walkthrough.\n\n";

        $systemInstruction .= "AUTONOMOUS BOOKING INSTRUCTIONS (CRITICAL FIREWALL):\n";
        $systemInstruction .= "When a client explicitly provides their details to schedule/book a private viewing (including: Name, Email, Phone, Preferred Date, Preferred Time (Morning, Afternoon, or Evening), and the Selected Property), you must output a structured metadata tag at the VERY end of your text response in this exact format so our database can log it automatically:\n";
        $systemInstruction .= "[BOOKING_DATA: {\"name\": \"Client Name\", \"email\": \"email@test.com\", \"phone\": \"090000000\", \"date\": \"YYYY-MM-DD\", \"time\": \"Morning|Afternoon|Evening\", \"property_id\": numeric_id_from_above}]\n";
        $systemInstruction .= "Ensure you compile the JSON correctly. Never output the booking tag unless you have received ALL necessary details (Name, Email, Phone, Date, Time, and Selected Property ID). If any of these are missing, politely ask the client to provide them first.\n";

        // 3. Construct Gemini API message stream payload
        $formattedContents = [];
        foreach ($history as $chat) {
            $formattedContents[] = [
                'role' => $chat['role'] === 'user' ? 'user' : 'model',
                'parts' => [['text' => $chat['text']]]
            ];
        }

        // Add the newest message
        $formattedContents[] = [
            'role' => 'user',
            'parts' => [['text' => $userMessage]]
        ];

        // 4. API Request using Laravel HTTP Client
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            return response()->json([
                'reply' => "I apologize, but my core AI connection is currently offline (Missing API configurations). Please contact our support team at advisory@darallhomes.com."
            ]);
        }

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key=" . $apiKey, [
                'contents' => $formattedContents,
                'systemInstruction' => [
                    'parts' => [['text' => $systemInstruction]]
                ],
                'generationConfig' => [
                    'temperature' => 0.3,
                    'maxOutputTokens' => 2048,
                ]
            ]);

            if ($response->failed()) {
                Log::error("Gemini API Error: " . $response->body());
                return response()->json([
                    'reply' => "I apologize, but I encountered a slight connection error while coordinating with our central intelligence. Could you please send your message again?"
                ]);
            }

            $result = $response->json();
            $reply = $result['candidates'][0]['content']['parts'][0]['text'] ?? "I apologize, but I am currently unable to process your request. How else can I assist you?";

            // 5. AUTONOMOUS DATABASE SYNC INTEGRATION: Check for BOOKING_DATA token
            if (preg_match('/\[BOOKING_DATA:\s*(.*?)\]/s', $reply, $matches)) {
                $jsonData = json_decode($matches[1], true);
                if ($jsonData) {
                    // Extract and resolve variables securely
                    $propId = $jsonData['property_id'] ?? null;
                    $dateStr = $jsonData['date'] ?? now()->addDays(1)->format('Y-m-d');
                    
                    try {
                        $parsedDate = date('Y-m-d', strtotime($dateStr));
                    } catch (\Exception $e) {
                        $parsedDate = now()->addDays(1)->format('Y-m-d');
                    }

                    // Strict Foreign Key Pre-Flight Validation Check:
                    // Only insert if the property_id actually exists in our properties table to prevent MySQL constraint crashes!
                    $propertyExists = Property::where('id', $propId)->exists();

                    if ($propertyExists) {
                        try {
                            // A. Create the Property Enquiry Record
                            PropertyEnquiry::create([
                                'property_id' => $propId,
                                'user_id' => auth()->id(),
                                'name' => $jsonData['name'] ?? 'AI Guest',
                                'email' => $jsonData['email'] ?? '',
                                'phone' => $jsonData['phone'] ?? '',
                                'message' => 'Requested Private Inspection via Darall AI Chatbot on ' . $parsedDate . ' during ' . ($jsonData['time'] ?? 'Morning') . '.',
                                'status' => 'New',
                            ]);

                            // B. Create the Inspection Request Record
                            InspectionRequest::create([
                                'property_id' => $propId,
                                'user_id' => auth()->id(),
                                'requested_date' => $parsedDate,
                                'requested_time' => $jsonData['time'] ?? 'Morning',
                                'status' => 'Pending',
                                'notes' => 'Scheduled autonomously via Darall AI Assistant.',
                            ]);
                            
                            Log::info("Autonomous booking logged successfully for client: " . ($jsonData['name'] ?? 'Guest'));

                        } catch (\Exception $dbException) {
                            // Catch any unexpected SQL exceptions to prevent 500 crashes and keep chat flow online!
                            Log::error("Failed to insert autonomous AI booking into database: " . $dbException->getMessage());
                        }
                    } else {
                        Log::warning("Skipped autonomous AI booking creation: Property ID [{$propId}] does not exist on disk.");
                    }
                }

                // Clean and strip the BOOKING_DATA tag from the final response so the user never sees raw JSON code!
                $reply = preg_replace('/\[BOOKING_DATA:\s*.*?\]/s', '', $reply);
            }

            return response()->json([
                'reply' => trim($reply)
            ]);

        } catch (\Exception $e) {
            Log::error("Exception in ChatbotController: " . $e->getMessage());
            return response()->json([
                'reply' => "I apologize, but I encountered a slight connection issue. Please feel free to schedule a private inspection directly or message us on WhatsApp!"
            ]);
        }
    }
}
