# MASTER DEVELOPMENT SPECIFICATION
## Premium Real Estate, Virtual Property Experience & Future Shortlet Platform

---

# 1. PROJECT OVERVIEW

We are building a modern, premium real-estate digital platform for a real estate company.

This project should NOT be treated as a simple company website or brochure website.

The goal is to create a **property discovery, property marketing, virtual viewing and lead-conversion platform** that can later evolve into a complete shortlet booking and property management platform.

The website should allow prospective customers to:

1. Discover properties.
2. Search and filter properties.
3. View detailed information about properties.
4. View high-quality property photographs and videos.
5. Experience properties through an interactive 360°/3D virtual walkthrough.
6. Navigate through different rooms and spaces virtually.
7. Ask questions through an AI-powered property chatbot.
8. Contact the company or an agent.
9. Request or schedule a physical inspection.
10. Eventually book shortlet properties directly through the platform.

The long-term vision is:

**Discover → Explore → Understand → Virtually Experience → Enquire → Inspect → Book/Buy**

The website should therefore be designed as a **digital property showroom**, not merely an online listing catalogue.

---

# 2. CORE BUSINESS IDEA

The major differentiating feature of this platform is the ability for a customer to experience a property virtually before physically visiting it.

Traditional real-estate journey:

Customer sees property online
↓
Customer contacts agent
↓
Customer schedules inspection
↓
Customer travels to property
↓
Customer sees property
↓
Customer decides whether they are interested

Proposed digital journey:

Customer sees property online
↓
Customer opens property page
↓
Customer explores photographs/videos
↓
Customer enters virtual walkthrough
↓
Customer moves through rooms
↓
Customer understands the property
↓
Customer asks AI assistant questions
↓
Customer decides:
    ├── Book inspection
    ├── Contact agent
    ├── Send enquiry
    └── Eventually book shortlet / purchase

The website should reduce friction between discovering a property and taking meaningful action.

---

# 3. LONG-TERM PRODUCT VISION

The platform should be built in a way that allows the following progression:

### PHASE 1

Professional real-estate website + property CMS + property landing pages + virtual tour integration + AI chatbot + enquiries + inspection requests.

### PHASE 2

Shortlet management + availability + booking + online payments.

### PHASE 3

Customer accounts + saved properties + booking history + agent portal.

### PHASE 4

CRM + sales pipeline + lead management + analytics.

### PHASE 5

Advanced AI property recommendation + WhatsApp AI + automated lead qualification + intelligent follow-up.

The architecture must therefore be modular and extensible.

Do not build Phase 1 in a way that makes Phase 2 or Phase 3 difficult.

---

# 4. PRIMARY USER TYPES

The system should initially support the following users.

## 4.1 Public Visitor

A visitor who does not have an account.

They should be able to:

- Browse properties.
- Search properties.
- Filter properties.
- View property details.
- View images.
- Watch videos.
- Enter virtual tours.
- Ask the AI chatbot questions.
- Contact the company.
- Contact an agent.
- Submit enquiries.
- Request an inspection.

An account should NOT be required for basic property discovery.

---

## 4.2 Customer / Future Guest

This user will become more important when shortlet booking is introduced.

They may eventually be able to:

- Create an account.
- Save properties.
- Book inspections.
- Book shortlets.
- View bookings.
- Cancel bookings where applicable.
- View payment history.
- Manage their profile.

Do not overbuild customer authentication in Phase 1 unless required.

Prepare the architecture for it.

---

## 4.3 Administrator

The administrator manages the platform.

They should eventually be able to:

- Manage properties.
- Manage property categories.
- Manage locations.
- Manage amenities.
- Manage property media.
- Manage virtual tours.
- Manage enquiries.
- Manage inspections.
- Manage users.
- Manage website content.
- Manage blog posts.
- Manage AI knowledge/content.
- Manage shortlet listings.
- Manage bookings.
- Manage payments.
- View analytics.

---

## 4.4 Agent

Agent functionality may initially be basic but should be considered in the architecture.

Eventually agents should be able to:

- View assigned properties.
- View enquiries.
- Contact leads.
- View inspection requests.
- Update lead status.
- Manage assigned customers.

---

# 5. MAIN WEBSITE

The main website is the public-facing experience.

It should feel premium, trustworthy, modern and visually sophisticated.

The website should communicate:

- Luxury
- Trust
- Professionalism
- Transparency
- Convenience
- Technology
- Property expertise

Do not design it like a generic template.

---

# 6. MAIN WEBSITE STRUCTURE

The main website should include:

### Home

### About Us

### Properties

### Properties for Sale

### Properties for Rent

### Shortlets

### Projects / Developments

### Services

### Blog / Insights

### FAQs

### Contact

### Individual Property Pages

### Inspection Request

### Enquiry

The navigation should remain simple and intuitive.

---

# 7. HOMEPAGE

The homepage should immediately communicate what the company does.

Recommended structure:

## Hero

Large premium property imagery/video.

Headline such as:

**Find a Property You Can Experience Before You Visit.**

Supporting text explaining the company's property offerings.

Primary CTAs:

**Explore Properties**

**Take a Virtual Tour**

Secondary CTA:

**Schedule an Inspection**

---

## Featured Properties

Display selected properties.

Each property card should contain:

- Image
- Property name
- Location
- Price
- Property type
- Bedrooms
- Bathrooms
- Short description
- Virtual Tour indicator where available
- View Property button

---

## Virtual Property Experience

Create a dedicated section explaining the platform's key differentiator.

Example concept:

### Don't Just View the Property. Experience It.

Explain that visitors can virtually walk through selected properties before arranging an inspection.

CTA:

**Explore Virtual Tours**

---

## Property Categories

Examples:

- For Sale
- For Rent
- Shortlets
- Luxury Homes
- Apartments
- Duplexes
- Commercial

---

## Why Choose Us

Explain the company's value proposition.

---

## Featured Projects

Show developments/projects.

---

## AI Assistant

Introduce the AI property assistant.

Example:

### Looking for the right property?

Ask our AI Property Assistant.

---

## Testimonials

Customer reviews.

---

## Location / Coverage

Show major locations where the company operates.

---

## CTA

Strong final conversion section:

**Ready to Find Your Next Property?**

Buttons:

**Explore Properties**

**Contact Us**

---

# 8. PROPERTY LISTING PAGE

The property listing page should provide:

- Search
- Filters
- Sorting
- Property cards
- Pagination or infinite loading
- Property categories
- Location filtering
- Price filtering
- Bedrooms
- Bathrooms
- Amenities
- Property status

Example filters:

Property Type
Purpose
Location
Min Price
Max Price
Bedrooms
Bathrooms
Furnished
Virtual Tour Available

---

# 9. PROPERTY CARD

Each card should show:

- Property image
- Property title
- Location
- Price
- Type
- Bedrooms
- Bathrooms
- Featured badge where applicable
- Virtual Tour badge where applicable
- View Property button

Example:

LUXURY 4-BEDROOM DUPLEX

Lekki Phase 1, Lagos

₦150,000,000

4 Bedrooms
5 Bathrooms

[Virtual Tour Available]

[Explore Property]

---

# 10. INDIVIDUAL PROPERTY PAGE

This is one of the most important pages in the entire application.

Every property should have its own unique URL.

Example:

/properties/luxury-4-bedroom-duplex-lekki

The page should be designed like a **sales landing page**, not merely a database record.

---

# 11. PROPERTY LANDING PAGE STRUCTURE

## Section 1 — Hero

Property image/video.

Property title.

Location.

Price.

Primary CTA:

**Take Virtual Tour**

Secondary CTA:

**Schedule Inspection**

---

## Section 2 — Property Summary

Display:

- Bedrooms
- Bathrooms
- Property type
- Floor area where available
- Parking
- Furnishing
- Status

---

## Section 3 — Virtual Tour

This should be one of the most prominent sections.

Headline:

**Walk Through the Property Before You Visit**

Embed the property's 360°/3D virtual tour.

The user should be able to:

- Look around.
- Move between spaces.
- Select rooms.
- Navigate the property.
- View hotspots.
- Access floor plan navigation where supported.

Do not build a complex Google Earth engine from scratch.

Use an appropriate professional 360°/3D virtual-tour provider/API/embed solution.

The integration must be abstracted so that the website is not permanently tied to one provider.

---

# 12. VIRTUAL TOUR DATA MODEL

A property should be able to have a virtual tour.

Conceptually:

Property
↓
Virtual Tour
↓
Provider
↓
Tour URL / Embed URL
↓
Thumbnail
↓
Tour Metadata

The database should allow future providers to be supported.

Example conceptual fields:

- id
- property_id
- provider
- tour_url
- embed_url
- thumbnail
- description
- active
- created_at
- updated_at

Do not hard-code one provider into the entire application.

---

# 13. PROPERTY GALLERY

Include:

- Images
- Videos
- Optional floor plans
- Optional documents where appropriate

Images should support:

- Lazy loading
- Responsive sizing
- Compression
- Modern image formats where possible
- Optimized thumbnails

---

# 14. ROOM-BY-ROOM PRESENTATION

Where appropriate, property pages should highlight:

- Living Room
- Dining Area
- Kitchen
- Master Bedroom
- Bedrooms
- Bathrooms
- Balcony
- Garden
- Pool
- Garage
- Exterior

Each room can have:

- Photos
- Description
- Features
- Related virtual-tour location

---

# 15. AMENITIES

Properties should support reusable amenities.

Examples:

- Swimming Pool
- Gym
- Parking
- Security
- Generator
- CCTV
- Fitted Kitchen
- Air Conditioning
- Garden
- Balcony
- Wi-Fi
- Smart TV

Amenities should be stored separately where practical so they can be reused across properties.

---

# 16. LOCATION

Property pages should include:

- Location
- Area
- City
- State
- Map
- Nearby landmarks where appropriate

Do not expose sensitive exact location information for properties where the company does not want the exact address publicly displayed.

---

# 17. PROPERTY CONVERSION SECTION

Every property page should eventually drive the customer toward an action.

Include:

### Interested in this property?

[Schedule an Inspection]

[Send Enquiry]

[Chat on WhatsApp]

[Ask AI Assistant]

For shortlets:

[Check Availability]

[Book Now]

---

# 18. INSPECTION BOOKING

The Phase 1 system should support inspection requests.

Form fields may include:

- Name
- Email
- Phone
- Property
- Preferred date
- Preferred time
- Message

After submission:

- Store the request.
- Notify administrator.
- Optionally notify assigned agent.
- Display confirmation.
- Prevent duplicate accidental submissions.

Future versions can introduce actual agent availability calendars.

---

# 19. AI CHATBOT

The AI chatbot should be integrated into the website.

It should behave as an **AI Property Assistant**.

It should not simply be a generic chatbot.

Its purpose is to help customers:

- Discover properties.
- Ask questions.
- Understand property features.
- Find properties based on requirements.
- Navigate the website.
- Find relevant virtual tours.
- Understand company services.
- Start an enquiry.
- Connect with a human agent.

---

# 20. AI CHATBOT EXAMPLES

Customer:

"I need a 3 bedroom apartment in Lekki."

The assistant should be able to:

1. Understand the requirements.
2. Search the available property data.
3. Return relevant properties.
4. Provide links to property pages.
5. Offer virtual tours where available.

Customer:

"Does this apartment have parking?"

The AI should answer using trusted property information.

Customer:

"Can I inspect this property?"

The AI should direct them toward inspection booking.

Customer:

"I want something under ₦100m."

The AI should help filter relevant properties.

---

# 21. AI SAFETY / DATA PRINCIPLES

The AI should not invent property information.

If the database does not contain an answer, the assistant should say that the information is unavailable and offer to connect the visitor with the company.

Property information supplied by the company's database should be treated as the authoritative source.

AI API keys must never be exposed in frontend code.

AI requests should be handled server-side.

AI usage should be logged appropriately without storing unnecessary sensitive information.

---

# 22. ADMIN DASHBOARD

The admin dashboard is a separate major part of the application.

It should be clean, professional and easy for non-technical staff to use.

Suggested navigation:

Dashboard

Properties

Property Categories

Locations

Amenities

Virtual Tours

Enquiries

Inspections

Agents

Customers

Blog

Pages / Content

AI Assistant

Settings

Users / Roles

Shortlets

Bookings

Payments

Analytics

Some modules can remain hidden or disabled until their respective development phases.

---

# 23. ADMIN DASHBOARD — DASHBOARD HOME

The dashboard should provide an overview.

Possible metrics:

Total Properties

Published Properties

Properties For Sale

Properties For Rent

Shortlets

New Enquiries

Pending Inspections

Upcoming Inspections

Virtual Tour Properties

Leads

Future:

Bookings

Revenue

Conversion Rate

Popular Properties

---

# 24. PROPERTY MANAGEMENT

Admin should be able to:

- Create property.
- Edit property.
- Publish property.
- Unpublish property.
- Archive property.
- Delete property where appropriate.
- Mark featured.
- Set price.
- Set status.
- Assign category.
- Assign location.
- Add bedrooms.
- Add bathrooms.
- Add amenities.
- Add description.
- Add images.
- Add video.
- Add virtual tour.
- Add floor plan.
- Add SEO metadata.

---

# 25. PROPERTY STATUS

Support statuses such as:

- Draft
- Available
- Featured
- Under Offer
- Sold
- Rented
- Unavailable
- Archived

For shortlets, additional availability logic will be introduced later.

---

# 26. PROPERTY CATEGORIES

The admin should be able to manage categories.

Examples:

- Apartment
- Duplex
- Detached House
- Semi-Detached House
- Penthouse
- Land
- Commercial Property
- Office
- Shortlet

---

# 27. LOCATION MANAGEMENT

Locations should be reusable.

Conceptual structure:

Country
↓
State
↓
City
↓
Area

Example:

Nigeria
↓
Lagos
↓
Lagos
↓
Lekki Phase 1

The implementation should not unnecessarily overcomplicate the first version.

---

# 28. MEDIA MANAGEMENT

Property images should be manageable through the admin dashboard.

Each property can have:

- Cover image
- Gallery
- Videos
- Floor plans
- Virtual-tour thumbnail

The system should validate file types and sizes.

---

# 29. ENQUIRY MANAGEMENT

Admin should see:

Customer

Phone

Email

Property

Message

Date

Status

Possible statuses:

New

Contacted

Qualified

Inspection Requested

Converted

Closed

---

# 30. INSPECTION MANAGEMENT

Admin should see:

Customer

Property

Requested Date

Requested Time

Status

Assigned Agent

Notes

Possible statuses:

Pending

Confirmed

Completed

Cancelled

Rescheduled

---

# 31. AGENT MANAGEMENT

Prepare the system for agents.

Agent profile:

- Name
- Email
- Phone
- Photo
- Bio
- Status
- Assigned properties

Future capabilities:

- Assigned leads
- Assigned inspections
- Lead status updates
- Performance analytics

---

# 32. BLOG / CONTENT MANAGEMENT

Admin should be able to manage:

- Blog posts
- Categories
- Featured image
- Author
- SEO title
- Meta description
- Slug
- Publish date
- Draft/published status

This is important for SEO and long-term organic traffic.

---

# 33. SEO

SEO should be considered from the beginning.

Every important page should support:

- SEO title
- Meta description
- Slug
- Canonical URL
- Open Graph image
- Structured data where appropriate

Generate:

- Sitemap
- Robots.txt

Property pages should have clean URLs.

Example:

/properties/4-bedroom-luxury-duplex-lekki-phase-1

Avoid:

/property?id=123

---

# 34. PERFORMANCE

The application should be optimized for performance.

Requirements:

- Image optimization.
- Lazy loading.
- Proper caching.
- Minified production assets.
- Efficient database queries.
- Pagination.
- Avoid N+1 queries.
- CDN-ready media architecture.
- Responsive images.
- Server-side caching where useful.

Virtual tours and large media must not unnecessarily slow down the entire website.

---

# 35. SECURITY

Follow standard web application security practices.

Requirements:

- Secure authentication.
- Authorization.
- Role-based permissions.
- CSRF protection.
- Input validation.
- Output escaping.
- SQL injection prevention.
- Secure file upload validation.
- Rate limiting for sensitive endpoints.
- Secure API key storage.
- Secure environment variables.
- Audit-sensitive administrative actions where appropriate.

Never place secret API keys in frontend JavaScript.

---

# 36. RECOMMENDED TECHNOLOGY

Use an architecture appropriate for a professional Laravel application.

Recommended:

Backend:

Laravel

Frontend:

Laravel Blade with Livewire/Alpine.js where appropriate, plus JavaScript for interactive experiences.

Database:

MySQL or PostgreSQL according to the deployment decision.

Server:

Linux VPS.

Web server:

Nginx.

Version control:

Git.

External integrations:

- AI API
- Virtual-tour provider
- WhatsApp
- Maps
- Email
- Future payment gateway

Do not introduce React/Next.js or additional frameworks unless there is a clear architectural reason.

The goal is maintainability and fast delivery.

---

# 37. DEVELOPMENT PRINCIPLE

IMPORTANT:

Do NOT attempt to build the entire application in one step.

Build the system incrementally.

Each phase must:

1. Have a clearly defined objective.
2. Have clearly defined database requirements.
3. Have clearly defined backend requirements.
4. Have clearly defined frontend requirements.
5. Be tested.
6. Be reviewed.
7. Be completed before moving to the next phase.

Do not create fake functionality simply to make a page appear complete.

If a feature is not implemented, clearly mark it as pending rather than pretending it works.

---

# 38. PHASE 0 — DISCOVERY & ARCHITECTURE

Before writing application code:

Analyze this specification.

Create:

- System architecture.
- Application modules.
- Database ERD/conceptual relationships.
- Route structure.
- Authentication/authorization strategy.
- Folder structure.
- Integration strategy.
- Deployment strategy.
- Environment variables required.
- Third-party services required.
- Development roadmap.

Do not start implementing major features until the architecture has been established.

---

# 39. PHASE 1 — PROJECT FOUNDATION

Set up:

- Laravel application.
- Database connection.
- Environment configuration.
- Git repository.
- Base application structure.
- Authentication for admin.
- Admin layout.
- Public website layout.
- Navigation.
- Footer.
- Basic error handling.
- Logging.
- Initial database migrations.
- Seeders/factories where useful.

Acceptance criteria:

The application must run successfully locally.

Admin can log in.

Public website loads.

Database connection works.

---

# 40. PHASE 2 — DATABASE & PROPERTY DOMAIN

Implement the core property system.

Entities should include concepts such as:

User

Role

Property

PropertyCategory

Location

Amenity

PropertyAmenity

PropertyImage

PropertyVideo

VirtualTour

PropertyEnquiry

InspectionRequest

Agent

BlogPost

Additional entities should be introduced when justified.

Create:

- Migrations.
- Models.
- Relationships.
- Factories.
- Seeders.
- Validation rules.

Do not duplicate property data unnecessarily.

---

# 41. PHASE 3 — ADMIN PROPERTY MANAGEMENT

Build:

Property list

Create property

Edit property

View property

Publish/unpublish

Archive

Media management

Amenities

Categories

Locations

Virtual-tour configuration

SEO fields

Test all CRUD operations.

---

# 42. PHASE 4 — PUBLIC PROPERTY EXPERIENCE

Build:

Property listing page.

Search.

Filtering.

Sorting.

Pagination.

Property cards.

Individual property page.

Gallery.

Specifications.

Amenities.

Location.

Map.

Related properties.

CTA sections.

Ensure mobile responsiveness.

---

# 43. PHASE 5 — PROPERTY LANDING PAGE ENGINE

Transform the individual property page into a powerful sales landing page.

Implement reusable sections:

Hero

Property summary

Virtual experience

Gallery

Room highlights

Amenities

Location

Lifestyle/value proposition

Inspection CTA

Enquiry CTA

WhatsApp CTA

Related properties

The page should dynamically render based on property data.

Do NOT manually hard-code Property A, Property B, Property C.

One reusable template should generate all property landing pages.

---

# 44. PHASE 6 — VIRTUAL TOUR INTEGRATION

Implement the virtual-tour system.

Admin should be able to:

- Add provider.
- Add tour URL/embed URL.
- Add thumbnail.
- Activate/deactivate tour.

Public property page should detect whether a virtual tour exists.

If it exists:

Display:

**Take a Virtual Tour**

If not:

Do not show a broken virtual-tour section.

The integration should be responsive.

Do not expose provider API secrets.

---

# 45. PHASE 7 — ENQUIRIES & INSPECTIONS

Implement:

Enquiry form.

Inspection request form.

Backend validation.

Database storage.

Admin notifications.

Admin enquiry management.

Inspection management.

Status changes.

Optional email notifications.

Ensure spam protection/rate limiting where appropriate.

---

# 46. PHASE 8 — AI PROPERTY ASSISTANT

Implement the AI chatbot after the property domain is functional.

The AI should have access to trusted property information.

Architecture should be:

User
↓
Chat UI
↓
Backend API
↓
AI service
↓
Property search/data tools
↓
Response

The AI should not directly have unrestricted database access.

Use controlled server-side tools/functions.

Example tools:

searchProperties()

getPropertyDetails()

getAvailableProperties()

findPropertiesByLocation()

findPropertiesByBudget()

getPropertyAmenities()

createEnquiry()

The AI should use these tools to answer accurately.

---

# 47. PHASE 9 — SHORTLET FOUNDATION

Prepare shortlet functionality.

Introduce concepts such as:

ShortletProperty

Unit

Availability

Booking

Guest

BookingStatus

Pricing

Future:

Payment

Refund

Cancellation

Do not implement complex payment functionality until the basic booking domain is stable.

---

# 48. PHASE 10 — SHORTLET BOOKING

Implement:

Shortlet listings.

Virtual tours.

Availability calendar.

Check-in.

Check-out.

Guests.

Pricing calculation.

Booking creation.

Booking confirmation.

Customer details.

Admin booking management.

Prevent double booking through proper database constraints and transactional logic.

---

# 49. PHASE 11 — PAYMENT

Integrate an appropriate Nigerian payment gateway such as Paystack or Flutterwave after the booking system is stable.

Requirements:

- Payment initiation.
- Payment callback/webhook.
- Transaction verification.
- Booking status updates.
- Payment records.
- Idempotency.
- Failed payment handling.

Never trust the frontend alone to confirm payment.

Payment confirmation must be verified server-side.

---

# 50. PHASE 12 — CUSTOMER ACCOUNTS

Introduce:

Registration

Login

Password reset

Profile

Saved properties

Inspection history

Bookings

Payment history

Notifications

Only implement this when required by the product stage.

---

# 51. PHASE 13 — CRM & LEAD MANAGEMENT

Build a sales pipeline:

New Lead
↓
Contacted
↓
Qualified
↓
Inspection Scheduled
↓
Inspection Completed
↓
Negotiation
↓
Converted
↓
Closed/Lost

Allow admins/agents to manage leads.

---

# 52. PHASE 14 — AGENT PORTAL

Agents should eventually have their own dashboard.

They can see:

- Assigned properties.
- Leads.
- Inspections.
- Customers.
- Follow-ups.
- Performance.

Agents should only access information permitted by their role.

---

# 53. PHASE 15 — ANALYTICS

Future analytics should include:

Property views.

Virtual-tour launches.

Most viewed properties.

Most popular locations.

Enquiries.

Inspection requests.

Bookings.

Revenue.

Lead conversion.

Popular shortlets.

AI chatbot interactions.

Conversion from property view → enquiry.

Conversion from virtual tour → inspection.

This data can become extremely valuable to the company.

---

# 54. RESPONSIVE DESIGN

The entire application must be responsive.

Design for:

Mobile

Tablet

Laptop

Desktop

Large desktop

Do not build desktop first and treat mobile as an afterthought.

The property virtual-tour experience must also be usable on mobile devices.

---

# 55. DESIGN DIRECTION

The design should feel:

Premium

Modern

Elegant

Professional

Minimal

Trustworthy

Luxury-oriented without being excessive.

Use generous whitespace.

Strong typography.

High-quality property imagery.

Subtle animations.

Clear CTAs.

Avoid excessive gradients, unnecessary animations and generic dashboard/template aesthetics.

The interface should feel like a premium real-estate brand.

---

# 56. USER EXPERIENCE PRINCIPLE

Always answer this question:

### "What does the user need to do next?"

For example:

Property page:

View property
↓
Take virtual tour
↓
Ask question
↓
Book inspection

Shortlet:

View apartment
↓
Take virtual tour
↓
Check availability
↓
Book

Do not create pages that have no clear conversion path.

---

# 57. DATABASE DESIGN PRINCIPLE

Use normalized relational structures where appropriate.

Avoid:

- Repeating property information.
- Storing arrays in fields unnecessarily.
- Hard-coding categories.
- Hard-coding amenities.
- Hard-coding property pages.

Use relationships.

For example:

Property
belongsTo Category

Property
belongsTo Location

Property
hasMany Images

Property
belongsToMany Amenities

Property
hasOne VirtualTour

Property
hasMany Enquiries

Property
hasMany InspectionRequests

This allows the platform to scale.

---

# 58. ROUTING PRINCIPLE

Use clean, readable URLs.

Examples:

/

 /properties

 /properties/for-sale

 /properties/for-rent

 /shortlets

 /properties/luxury-4-bedroom-duplex-lekki

 /projects

 /blog

 /contact

Admin:

 /admin

 /admin/properties

 /admin/properties/create

 /admin/enquiries

 /admin/inspections

 /admin/virtual-tours

Use route model binding where appropriate.

---

# 59. CODE QUALITY REQUIREMENTS

Write production-quality code.

Follow:

- SOLID principles where appropriate.
- DRY principles.
- Laravel conventions.
- Service classes where business logic warrants them.
- Form Requests for validation.
- Policies/Gates for authorization.
- Events/listeners where appropriate.
- Jobs/queues for slow operations.
- API resources where APIs are required.
- Proper exception handling.
- Clear naming conventions.

Do not over-engineer simple functionality.

---

# 60. TESTING REQUIREMENTS

Each major module must be tested.

At minimum test:

- Authentication.
- Property creation.
- Property editing.
- Property publishing.
- Property filtering.
- Property retrieval.
- Image/media validation.
- Enquiry submission.
- Inspection submission.
- Admin authorization.
- Virtual-tour rendering.
- AI integration.
- Booking logic when implemented.
- Payment webhook handling when implemented.

Use automated tests where practical.

---

# 61. ERROR HANDLING

Never allow raw exceptions to be shown to customers.

Public users should receive friendly messages.

Administrators should have enough logging information to diagnose issues.

External API failures must be handled gracefully.

If the AI service is unavailable:

Display a fallback message and allow the user to contact the company.

If a virtual-tour provider fails:

The rest of the property page should continue functioning.

---

# 62. DEPLOYMENT

The production environment should be suitable for a Laravel application.

Recommended:

Linux VPS

Nginx

PHP

Database

SSL

Git deployment

Queue worker where required

Cron/scheduler

Backups

Logging

Monitoring

Environment variables

Do not place production secrets in source control.

---

# 63. MEDIA STORAGE

The application should be designed with the possibility of using object/cloud storage later.

Large property media should not unnecessarily consume application server resources.

The architecture should allow future integration with:

- S3-compatible storage.
- CDN.
- Image optimization service.

---

# 64. BACKUPS

Production should have:

Database backups.

Application backup strategy where appropriate.

Media backup strategy.

The backup strategy must be documented.

---

# 65. ENVIRONMENT CONFIGURATION

Separate:

Local

Staging

Production

Never commit:

.env

API keys

Database credentials

Payment secrets

AI credentials

WhatsApp credentials

---

# 66. ADMIN ROLE & PERMISSIONS

Use role-based permissions.

At minimum consider:

Super Admin

Admin

Agent

Content Manager

Future:

Property Manager

Booking Manager

Do not give every employee full system access.

---

# 67. NOTIFICATION ARCHITECTURE

Prepare for notifications through:

Email

WhatsApp

SMS

In-app notifications

Notifications may be triggered by:

New enquiry

Inspection request

Inspection confirmation

Booking

Payment

Customer message

Agent assignment

Do not tightly couple business logic to one notification provider.

---

# 68. ANALYTICS EVENTS

Prepare an event-based analytics architecture.

Possible events:

property_viewed

virtual_tour_opened

inspection_requested

enquiry_submitted

whatsapp_clicked

ai_chat_started

ai_property_recommended

shortlet_booking_started

booking_completed

payment_completed

This will allow the company to understand what customers actually do.

---

# 69. DEVELOPMENT WORKFLOW FOR THE AI AGENT

IMPORTANT:

You are an AI development agent working on a real production application.

Do not attempt to generate the entire project blindly.

Follow this workflow:

### Step 1

Read and understand the entire specification.

### Step 2

Inspect the existing project.

If the project already contains code, do not destroy existing working functionality.

### Step 3

Create an implementation plan.

### Step 4

Identify dependencies and integrations.

### Step 5

Design the database.

### Step 6

Implement one phase.

### Step 7

Run tests.

### Step 8

Check for errors.

### Step 9

Review the implementation against the requirements.

### Step 10

Only then move to the next phase.

---

# 70. IMPORTANT AI AGENT RULE

Do not make assumptions silently.

When something is ambiguous:

- Identify the ambiguity.
- Choose the safest sensible implementation if it does not require a business decision.
- Clearly document the assumption.

Do not invent:

- Property information.
- Prices.
- Company information.
- Addresses.
- Agent details.
- API credentials.
- Payment credentials.

Use placeholders or database-driven content.

---

# 71. CONTENT PRINCIPLE

The system must be content-driven.

The developer should not hard-code:

Property A

Property B

House A

House B

Instead, the admin should be able to create any number of properties.

The same reusable property page template should automatically generate:

/properties/property-a

/properties/property-b

/properties/property-c

This is essential.

---

# 72. PERFORMANCE PRIORITY

Property websites contain large media files.

Pay special attention to:

- Image sizes.
- WebP/AVIF where supported.
- Lazy loading.
- Responsive images.
- Virtual-tour loading.
- Video loading.
- Database queries.
- Caching.
- CDN.

Do not load a large virtual-tour iframe or large video before the visitor needs it if doing so would unnecessarily hurt initial page performance.

---

# 73. ACCESSIBILITY

Follow good accessibility practices.

Include:

- Semantic HTML.
- Alt text.
- Keyboard navigation.
- Accessible forms.
- Proper labels.
- Good contrast.
- Focus states.
- Meaningful buttons.
- Screen-reader-friendly structure.

---

# 74. FINAL PHASE 1 ACCEPTANCE CRITERIA

Phase 1 should not be considered complete until:

### Main Website

The public website works on mobile and desktop.

### Properties

Properties can be created and managed from the admin dashboard.

### Property Pages

Each property automatically gets its own professional landing page.

### Search

Users can search/filter properties.

### Virtual Tours

Properties with virtual tours can display them properly.

### Enquiries

Users can submit enquiries.

### Inspections

Users can request inspections.

### AI

The AI assistant can answer approved property/company questions and help users discover properties.

### Admin

Administrators can manage the relevant data.

### SEO

Important public pages have proper metadata and crawlable URLs.

### Security

Authentication, authorization and validation are implemented.

### Performance

The application performs well under normal expected traffic.

### Deployment

The application can be deployed successfully to production.

---

# 75. PHASE 2 ACCEPTANCE CRITERIA

When Phase 2 is implemented:

- Shortlets are manageable.
- Shortlet units can be displayed.
- Availability can be checked.
- Customers can select dates.
- Pricing is calculated correctly.
- Double booking is prevented.
- Bookings are stored.
- Customers receive confirmation.
- Admin can manage bookings.

---

# 76. PRODUCT SUCCESS METRIC

The platform should ultimately be measured by business outcomes rather than only technical completion.

Important metrics:

Property views

Virtual-tour engagement

Enquiries

Inspection requests

Lead conversion

Shortlet bookings

Booking conversion

AI-assisted conversions

Revenue generated

The ultimate objective is:

### More qualified customers taking action on properties.

---

# 77. FINAL INSTRUCTION TO THE AI AGENT

Treat this document as the master product specification.

Do not reduce the project to a basic real-estate template.

The defining concept is:

> **A customer should be able to discover a property, experience it virtually, understand it, interact with an AI assistant and take the next step without leaving the website.**

The system must be:

- Professional.
- Scalable.
- Secure.
- Maintainable.
- SEO-friendly.
- Mobile-first.
- Content-driven.
- Conversion-focused.
- Modular.
- Ready for future shortlet booking and CRM functionality.

Before implementation, produce:

1. System architecture.
2. Database schema/ERD.
3. Module breakdown.
4. Route map.
5. Folder structure.
6. Development phases.
7. Third-party integration plan.
8. Environment variable list.
9. Deployment plan.

Then implement the project **phase by phase**, testing each phase before moving forward.

Never sacrifice architecture and code quality merely to make the application appear finished quickly.

The final product should feel like a **premium digital real-estate platform**, not a generic website template.