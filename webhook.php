<?php
// ============================================================
//  Vinay Automations — WhatsApp Cloud API Webhook v3.0
//  ✅ Accepts numbers AND normal words / alphabets
//  ✅ Full FAQ coverage for common client questions
//  ✅ Simple flat if/elseif — no database needed
// ============================================================

$verify_token    = "vinaybot123";
$access_token    = "EAAK1LtvA3osBQZCZAr7ib0awfzAufvpEeD0pAYdpd3TvqYodWGEHsZAWm50S9uQlYYDT7ZB9LuvuS3tQjXOC6jVI8kcJZCPwshQ5yX3DZACUjRY59Yum0wDc3fSUAcvNSR92E6ZCAeUbUUXqMhjGsLkD3JVSjNZAwreBnSp1wPDoHjVBNrOSUNUuxD94wq1FBhX6ePfqyZCTCxYgafH7xl9UDpERCWreGbUSp4pEZBca3iiKgqrYqDfHCicruZCSja24XCCM5RMPlS9BZCzr72qAhS3lB0KO"; // ← regenerate & paste here
$phone_number_id = "1010369098831786";

// ── GET: Webhook verification ────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $mode      = $_GET['hub.mode']         ?? $_GET['hub_mode']         ?? '';
    $token     = $_GET['hub.verify_token'] ?? $_GET['hub_verify_token'] ?? '';
    $challenge = $_GET['hub.challenge']    ?? $_GET['hub_challenge']    ?? '';

    if ($mode === 'subscribe' && $token === $verify_token) {
        echo $challenge;
        exit;
    }

    echo "Webhook is active ✅";
    exit;
}

// ── POST: Incoming message ───────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    http_response_code(200);

    $data = json_decode(file_get_contents('php://input'), true);

    $raw_message = trim(
        $data['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'] ?? ''
    );
    $from = $data['entry'][0]['changes'][0]['value']['messages'][0]['from'] ?? '';

    if ($raw_message === '' || $from === '') exit;

    // Lowercase copy used for matching — original kept for name capture etc.
    $msg = strtolower($raw_message);

    // ============================================================
    //  HELPER: check if message contains any of the given words
    // ============================================================
    // We use a simple inline approach below with str_contains()
    // so you can read every condition clearly.

    // ============================================================
    //  MAIN MENU TRIGGERS
    //  Numbers: 0
    //  Words:   hi, hello, hey, start, menu, help, namaste, hlo
    // ============================================================
    if (
        $msg === '0'        || $msg === 'hi'      || $msg === 'hello' ||
        $msg === 'hey'      || $msg === 'hlo'     || $msg === 'hii'   ||
        $msg === 'start'    || $msg === 'menu'    || $msg === 'help'  ||
        $msg === 'namaste'  || $msg === 'hai'     || $msg === 'helo'  ||
        $msg === 'hlw'      || $msg === 'back'    || $msg === 'home'  ||
        $msg === 'main menu'
    ) {
        $reply =
            "👋 *Welcome to Vinay Automations!*\n\n"
          . "We help startups & businesses build and automate digital solutions. 🚀\n\n"
          . "📌 *Choose a service — reply with number or keyword:*\n\n"
          . "1️⃣  *Website*     — Website Development\n"
          . "2️⃣  *Courses*     — Web Dev Courses\n"
          . "3️⃣  *Content*     — Content Writing\n"
          . "4️⃣  *Automation*  — Business Automation\n"
          . "5️⃣  *Contact*     — Contact Vinay\n\n"
          . "💬 *Common questions — reply with:*\n"
          . "➡ *price*     — All service pricing\n"
          . "➡ *portfolio* — View our work\n"
          . "➡ *offer*     — Current offers & discounts\n"
          . "➡ *timeline*  — Project delivery time\n"
          . "➡ *payment*   — Payment methods\n"
          . "➡ *refund*    — Refund policy\n"
          . "➡ *support*   — After-delivery support\n\n"
          . "_Type *menu* anytime to return here._";


    // ============================================================
    //  1. WEBSITE DEVELOPMENT
    //  Numbers: 1
    //  Words:   website, web, site, landing, portfolio (service)
    // ============================================================
    } elseif (
        $msg === '1'        ||
        $msg === 'website'  || $msg === 'web'       ||
        $msg === 'site'     || $msg === 'websites'   ||
        $msg === 'web development' || $msg === 'website development'
    ) {
        $reply =
            "🌐 *Website Development*\n\n"
          . "We build fast, mobile-ready, SEO-optimised websites:\n\n"
          . "✅ Startup websites\n"
          . "✅ Business websites\n"
          . "✅ Portfolio websites\n"
          . "✅ Web applications & dashboards\n"
          . "✅ E-commerce stores\n\n"
          . "📌 *Reply with number or keyword:*\n\n"
          . "11 / *pricing*   — Website pricing\n"
          . "12 / *portfolio* — See our portfolio\n"
          . "13 / *timeline*  — Delivery timeline\n"
          . "0  / *menu*      — Main menu";


    } elseif ($msg === '11' || $msg === 'website price' || $msg === 'web price' || $msg === 'web pricing') {
        $reply =
            "💰 *Website Pricing*\n\n"
          . "🔹 Startup Website    — ₹8,000 – ₹20,000\n"
          . "🔹 Business Website   — ₹12,000 – ₹35,000\n"
          . "🔹 Portfolio Website  — ₹5,000 – ₹12,000\n"
          . "🔹 E-commerce Store   — ₹20,000 – ₹60,000\n"
          . "🔹 Web Application    — ₹25,000 – ₹1,00,000+\n\n"
          . "📌 *Price depends on:* pages, features, design complexity.\n\n"
          . "📞 Reply *contact* or *5* to book a *free consultation*.\n"
          . "0 / *menu* — Main menu";

    } elseif ($msg === '12' || $msg === 'portfolio') {
        $reply =
            "🖥 *Our Portfolio*\n\n"
          . "View our completed projects here:\n"
          . "🔗 https://vinayportfolio.ct.ws\n\n"
          . "We've built websites for startups, coaching institutes,\n"
          . "local businesses, and individual professionals.\n\n"
          . "💬 Like what you see? Reply *contact* to get started.\n"
          . "0 / *menu* — Main menu";

    } elseif ($msg === '13') {
        $reply =
            "⏱ *Website Delivery Timeline*\n\n"
          . "🔹 Portfolio / Basic site — 3 to 5 days\n"
          . "🔹 Business website       — 5 to 10 days\n"
          . "🔹 Startup website        — 7 to 14 days\n"
          . "🔹 Web application        — 3 to 8 weeks\n\n"
          . "Timeline starts after content & requirements are confirmed.\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  2. COURSES
    //  Numbers: 2, 21, 22, 23
    //  Words:   course, courses, learn, training, mern, lamp, python, ai, ml
    // ============================================================
    } elseif (
        $msg === '2'        || $msg === 'courses'  || $msg === 'course'   ||
        $msg === 'learn'    || $msg === 'training' || $msg === 'class'    ||
        $msg === 'classes'  || $msg === 'coaching'
    ) {
        $reply =
            "🎓 *Web Development Courses*\n\n"
          . "Industry-ready courses with live projects:\n\n"
          . "🔹 *LAMP Stack*        — PHP, MySQL, Apache\n"
          . "🔹 *MERN Stack*        — MongoDB, Express, React, Node\n"
          . "🔹 *Full-Stack Python* — Django, React, PostgreSQL\n"
          . "🔹 *AI / ML Basics*    — Python, TensorFlow, Projects\n\n"
          . "📌 *Reply with number or keyword:*\n\n"
          . "21 / *syllabus*  — Course details & syllabus\n"
          . "22 / *fees*      — Course fees\n"
          . "23 / *enroll*    — Enroll now\n"
          . "0  / *menu*      — Main menu";

    } elseif (
        $msg === '21'       || $msg === 'syllabus' || $msg === 'curriculum' ||
        $msg === 'details'  || $msg === 'mern'     || $msg === 'lamp'       ||
        $msg === 'python'   || $msg === 'ai'       || $msg === 'ml'         ||
        $msg === 'course details'
    ) {
        $reply =
            "📚 *Course Syllabi*\n\n"
          . "*LAMP Stack (2 months):*\n"
          . "HTML/CSS → PHP OOP → MySQL → REST APIs → Laravel basics → cPanel hosting\n\n"
          . "*MERN Stack (3 months):*\n"
          . "JS ES6 → React → Node.js → Express → MongoDB → Deployment\n\n"
          . "*Full-Stack Python (3 months):*\n"
          . "Python → Django REST → React → PostgreSQL → AWS basics\n\n"
          . "*AI / ML Basics (2 months):*\n"
          . "Python → NumPy/Pandas → Scikit-learn → TensorFlow → Live projects\n\n"
          . "✅ All courses include live projects, mentorship & placement support.\n\n"
          . "22 / *fees* — See fees  |  23 / *enroll* — Enroll\n"
          . "0 / *menu* — Main menu";

    } elseif (
        $msg === '22'       || $msg === 'fees'     || $msg === 'fee'        ||
        $msg === 'cost'     || $msg === 'course fee' || $msg === 'course cost' ||
        $msg === 'course price' || $msg === 'how much course'
    ) {
        $reply =
            "💳 *Course Fees*\n\n"
          . "🔹 LAMP Stack        — 2 months — ₹900\n"
          . "🔹 MERN Stack        — 3 months — ₹1,200\n"
          . "🔹 Full-Stack Python — 3 months — ₹1,300\n"
          . "🔹 AI / ML Basics    — 2 months — ₹1,500\n\n"
          . "💡 EMI available.\n"
          . "🎉 *5% early-bird discount* on full payment.\n\n"
          . "23 / *enroll* — Enroll now\n"
          . "0 / *menu* — Main menu";

    } elseif (
        $msg === '23'       || $msg === 'enroll'   || $msg === 'join'       ||
        $msg === 'register' || $msg === 'admission' || $msg === 'enroll now'
    ) {
        $reply =
            "✅ *Enroll in a Course*\n\n"
          . "To enroll, reach out to Vinay directly:\n\n"
          . "📧 avalavinay4@gmail.com\n"
          . "🔗 https://vinayportfolio.ct.ws\n\n"
          . "We'll send the enrollment form + payment link within *2 hours*. 🕐\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  3. CONTENT WRITING
    //  Numbers: 3, 31, 32
    //  Words:   content, writing, blog, seo, article, copy
    // ============================================================
    } elseif (
        $msg === '3'        || $msg === 'content'  || $msg === 'writing'   ||
        $msg === 'blog'     || $msg === 'seo'      || $msg === 'article'   ||
        $msg === 'copywriting' || $msg === 'content writing'
    ) {
        $reply =
            "✍️ *Content Writing Services*\n\n"
          . "We write content that converts:\n\n"
          . "📝 Website copy (Home, About, Services)\n"
          . "📰 Blog articles & SEO content\n"
          . "📣 Social media captions & posts\n"
          . "📧 Email campaigns & newsletters\n"
          . "📄 Business proposals & pitch decks\n\n"
          . "📌 *Reply with number or keyword:*\n\n"
          . "31 / *sample*  — Request a free sample\n"
          . "32 / *quote*   — Get a content quote\n"
          . "0  / *menu*    — Main menu";

    } elseif ($msg === '31' || $msg === 'sample' || $msg === 'free sample') {
        $reply =
            "📄 *Free Content Sample*\n\n"
          . "We'll write a free sample for your business!\n\n"
          . "Just send us:\n"
          . "✏️ Your business name\n"
          . "✏️ Your niche / industry\n"
          . "✏️ What page or post you need\n\n"
          . "📧 Email: avalavinay4@gmail.com\n"
          . "🔗 Portfolio: https://vinayportfolio.ct.ws\n\n"
          . "0 / *menu* — Main menu";

    } elseif (
        $msg === '32'       || $msg === 'quote'    || $msg === 'content quote' ||
        $msg === 'content price' || $msg === 'writing price'
    ) {
        $reply =
            "💰 *Content Writing Pricing*\n\n"
          . "🔹 Website page copy        — from ₹500/page\n"
          . "🔹 Blog article (1,000w)    — from ₹400\n"
          . "🔹 SEO article (2,000w)     — from ₹800\n"
          . "🔹 Social media (10 posts)  — from ₹1,500\n"
          . "🔹 Email campaign (5 mails) — from ₹1,200\n"
          . "🔹 Business proposal        — from ₹2,000\n\n"
          . "📧 Custom quote: avalavinay4@gmail.com\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  4. BUSINESS AUTOMATION
    //  Numbers: 4, 41, 42, 43
    //  Words:   automation, automate, bot, whatsapp bot, appointment
    // ============================================================
    } elseif (
        $msg === '4'          || $msg === 'automation' || $msg === 'automate'  ||
        $msg === 'bot'        || $msg === 'whatsapp bot' || $msg === 'auto'
    ) {
        $reply =
            "⚙️ *Business Automation Services*\n\n"
          . "We automate repetitive tasks so you can focus on growth:\n\n"
          . "🏥 Hospitals & clinics\n"
          . "🏫 Schools & coaching institutes\n"
          . "🛒 Local stores & businesses\n"
          . "🏢 Startups & agencies\n\n"
          . "📌 *Reply with number or keyword:*\n\n"
          . "41 / *whatsapp*     — WhatsApp bot automation\n"
          . "42 / *appointment*  — Appointment automation\n"
          . "43 / *auto price*   — Automation pricing\n"
          . "0  / *menu*         — Main menu";

    } elseif (
        $msg === '41'         || $msg === 'whatsapp'    || $msg === 'whatsapp automation' ||
        $msg === 'wa bot'     || $msg === 'chatbot'
    ) {
        $reply =
            "💬 *WhatsApp Bot Automation*\n\n"
          . "We build custom WhatsApp bots that:\n\n"
          . "✅ Auto-reply to customers 24/7\n"
          . "✅ Send appointment & order confirmations\n"
          . "✅ Run follow-up & drip campaigns\n"
          . "✅ Capture leads automatically\n"
          . "✅ Handle FAQs without human effort\n\n"
          . "*Powered by Meta Cloud API — just like this bot!*\n\n"
          . "📞 Reply *contact* or *5* to get started.\n"
          . "0 / *menu* — Main menu";

    } elseif (
        $msg === '42'         || $msg === 'appointment'  || $msg === 'booking' ||
        $msg === 'appointment automation'
    ) {
        $reply =
            "📅 *Appointment Automation*\n\n"
          . "✅ Online booking page with calendar sync\n"
          . "✅ Automatic WhatsApp & SMS reminders\n"
          . "✅ Reschedule / cancel via WhatsApp\n"
          . "✅ Google Calendar integration\n"
          . "✅ Works for clinics, salons, coaching centres\n\n"
          . "*No more missed appointments or manual calls!*\n\n"
          . "📞 Reply *contact* or *5* to get started.\n"
          . "0 / *menu* — Main menu";

    } elseif (
        $msg === '43'         || $msg === 'auto price'   || $msg === 'automation price' ||
        $msg === 'automation pricing' || $msg === 'bot price'
    ) {
        $reply =
            "💰 *Automation Pricing*\n\n"
          . "🔹 Starter    — WhatsApp bot (5 flows)        — ₹7,000\n"
          . "🔹 Growth     — Bot + Appointment system       — ₹15,000\n"
          . "🔹 Enterprise — Full suite + CRM integration   — Custom quote\n\n"
          . "✅ Maintenance & hosting plans available.\n\n"
          . "📞 Reply *contact* or *5* to discuss your requirements.\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  5. CONTACT VINAY
    //  Numbers: 5
    //  Words:   contact, talk, call, reach, email, vinay
    // ============================================================
    } elseif (
        $msg === '5'          || $msg === 'contact'     || $msg === 'talk'    ||
        $msg === 'call'       || $msg === 'reach'       || $msg === 'email'   ||
        $msg === 'vinay'      || $msg === 'talk to vinay' || $msg === 'contact vinay'
    ) {
        $reply =
            "📞 *Contact Vinay*\n\n"
          . "🔗 Portfolio: https://vinayportfolio.ct.ws\n"
          . "📧 Email: avalavinay4@gmail.com\n\n"
          . "⏰ Response within *1–2 hours* (9 AM – 8 PM IST)\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: PRICING (all services overview)
    //  Words:   price, pricing, cost, rate, rates, charges, how much
    // ============================================================
    } elseif (
        $msg === 'price'      || $msg === 'pricing'     || $msg === 'cost'    ||
        $msg === 'rate'       || $msg === 'rates'       || $msg === 'charges' ||
        $msg === 'how much'   || $msg === 'what is the price' || $msg === 'fees'
    ) {
        $reply =
            "💰 *All Service Pricing — Quick Overview*\n\n"
          . "🌐 *Websites:*\n"
          . "  Startup site — ₹8,000 to ₹20,000\n"
          . "  Business site — ₹12,000 to ₹35,000\n"
          . "  Web app — ₹25,000+\n\n"
          . "🎓 *Courses:*\n"
          . "  LAMP / MERN / Python — ₹900 to ₹1,500\n\n"
          . "✍️ *Content Writing:*\n"
          . "  Blog article — from ₹400\n"
          . "  Website copy — from ₹500/page\n\n"
          . "⚙️ *Automation:*\n"
          . "  WhatsApp bot — from ₹7,000\n"
          . "  Full automation suite — custom quote\n\n"
          . "📞 For exact quote reply *contact* or *5*.\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: OFFERS & DISCOUNTS
    //  Words:   offer, discount, promo, deal, coupon, free
    // ============================================================
    } elseif (
        $msg === 'offer'      || $msg === 'offers'      || $msg === 'discount'  ||
        $msg === 'discounts'  || $msg === 'promo'       || $msg === 'deal'      ||
        $msg === 'coupon'     || $msg === 'free'        || $msg === 'free offer'
    ) {
        $reply =
            "🎉 *Current Offers & Discounts*\n\n"
          . "✅ *5% early-bird discount* on any course (full payment)\n"
          . "✅ *Free consultation* for all website projects\n"
          . "✅ *Free content sample* before you pay\n"
          . "✅ *Free 1-month support* after website delivery\n"
          . "✅ *Combo discount* — book website + automation together\n\n"
          . "📞 Contact Vinay to claim: reply *5* or *contact*\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: TIMELINE / DELIVERY
    //  Words:   timeline, delivery, time, how long, days, weeks, duration
    // ============================================================
    } elseif (
        $msg === 'timeline'   || $msg === 'delivery'    || $msg === 'how long'  ||
        $msg === 'duration'   || $msg === 'days'        || $msg === 'time'      ||
        $msg === 'when'       || $msg === 'deadline'    || $msg === 'delivery time'
    ) {
        $reply =
            "⏱ *Project Delivery Timeline*\n\n"
          . "🌐 *Websites:*\n"
          . "  Portfolio / basic site — 3–5 days\n"
          . "  Business website       — 5–10 days\n"
          . "  Startup website        — 7–14 days\n"
          . "  Web application        — 3–8 weeks\n\n"
          . "⚙️ *Automation:*\n"
          . "  Basic WhatsApp bot     — 2–5 days\n"
          . "  Appointment system     — 5–10 days\n"
          . "  Full suite             — 2–6 weeks\n\n"
          . "✍️ *Content Writing:*\n"
          . "  Blog / article         — 1–2 days\n"
          . "  Website copy           — 2–5 days\n\n"
          . "_Timeline starts after requirements & content are confirmed._\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: PAYMENT METHODS
    //  Words:   payment, pay, upi, bank, razorpay, gpay, phonepay, how to pay
    // ============================================================
    } elseif (
        $msg === 'payment'    || $msg === 'pay'         || $msg === 'upi'       ||
        $msg === 'bank'       || $msg === 'gpay'        || $msg === 'phonepay'  ||
        $msg === 'razorpay'   || $msg === 'how to pay'  || $msg === 'payment method' ||
        $msg === 'paytm'
    ) {
        $reply =
            "💳 *Payment Methods*\n\n"
          . "We accept:\n\n"
          . "✅ UPI (GPay, PhonePe, Paytm)\n"
          . "✅ Bank transfer (NEFT / IMPS)\n"
          . "✅ Razorpay payment link\n\n"
          . "📌 *Payment structure:*\n"
          . "  50% advance to start the project\n"
          . "  50% on final delivery\n\n"
          . "📧 Contact for payment link: avalavinay4@gmail.com\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: REFUND POLICY
    //  Words:   refund, money back, cancel, cancellation
    // ============================================================
    } elseif (
        $msg === 'refund'     || $msg === 'money back'  || $msg === 'cancel'   ||
        $msg === 'cancellation' || $msg === 'refund policy'
    ) {
        $reply =
            "🔄 *Refund & Cancellation Policy*\n\n"
          . "✅ Free cancellation before work starts\n"
          . "✅ Partial refund if cancelled mid-project (work done is charged)\n"
          . "✅ Full revision rounds included before final delivery\n"
          . "❌ No refund after final delivery & approval\n\n"
          . "We work closely with clients to ensure *100% satisfaction* before closing. 🙏\n\n"
          . "📧 Concerns? Email: avalavinay4@gmail.com\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: SUPPORT AFTER DELIVERY
    //  Words:   support, maintenance, after delivery, update, fix, bug
    // ============================================================
    } elseif (
        $msg === 'support'    || $msg === 'maintenance'  || $msg === 'after delivery' ||
        $msg === 'update'     || $msg === 'fix'          || $msg === 'bug'            ||
        $msg === 'after support' || $msg === 'post delivery'
    ) {
        $reply =
            "🛠 *After-Delivery Support*\n\n"
          . "✅ *1 month free support* on all website projects\n"
          . "✅ Bug fixes & minor changes included in support period\n"
          . "✅ WhatsApp support during 9 AM – 8 PM IST\n"
          . "✅ Ongoing maintenance plans available after free period\n\n"
          . "📌 *Maintenance plans:*\n"
          . "  Basic  — ₹500/month (hosting + uptime monitoring)\n"
          . "  Standard — ₹1,000/month (+ monthly updates)\n"
          . "  Premium  — ₹2,000/month (+ priority support)\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: WHO ARE YOU / ABOUT
    //  Words:   who, about, vinay automations, what do you do
    // ============================================================
    } elseif (
        $msg === 'who are you' || $msg === 'about'       || $msg === 'about you' ||
        $msg === 'what do you do' || $msg === 'info'     || $msg === 'who is vinay' ||
        $msg === 'vinay automations'
    ) {
        $reply =
            "ℹ️ *About Vinay Automations*\n\n"
          . "We are a digital solutions startup helping businesses grow online.\n\n"
          . "🚀 *What we do:*\n"
          . "  🌐 Build websites & web applications\n"
          . "  🎓 Teach web development courses\n"
          . "  ✍️ Write SEO content & copy\n"
          . "  ⚙️ Automate business processes\n\n"
          . "👤 *Founded by Vinay* — developer, trainer & automation expert.\n\n"
          . "🔗 https://vinayportfolio.ct.ws\n"
          . "📧 avalavinay4@gmail.com\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: LOCATION / WHERE ARE YOU
    //  Words:   location, where, city, address, place, india
    // ============================================================
    } elseif (
        $msg === 'location'   || $msg === 'where'        || $msg === 'city'    ||
        $msg === 'address'    || $msg === 'where are you' || $msg === 'place'
    ) {
        $reply =
            "📍 *Location*\n\n"
          . "We are based in *Andhra Pradesh, India* 🇮🇳\n\n"
          . "We work with clients *across India and globally* — all projects are handled remotely via WhatsApp, email & video calls.\n\n"
          . "🌍 No location barrier — we deliver anywhere!\n\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FAQ: EXPERIENCE / TRUST
    //  Words:   experience, trusted, clients, reviews, projects done
    // ============================================================
    } elseif (
        $msg === 'experience' || $msg === 'trusted'      || $msg === 'clients'  ||
        $msg === 'reviews'    || $msg === 'trust'        || $msg === 'projects' ||
        $msg === 'work'
    ) {
        $reply =
            "⭐ *Our Experience*\n\n"
          . "✅ Multiple websites delivered for startups & businesses\n"
          . "✅ Students trained in full-stack web development\n"
          . "✅ WhatsApp bots deployed for real businesses\n"
          . "✅ Content written for various niches\n\n"
          . "🔗 View our portfolio: https://vinayportfolio.ct.ws\n\n"
          . "💬 Want to speak with Vinay? Reply *contact* or *5*.\n"
          . "0 / *menu* — Main menu";


    // ============================================================
    //  FALLBACK — unknown message
    // ============================================================
    } else {
        $reply =
            "🤔 Sorry, I didn't understand *\"{$raw_message}\"*.\n\n"
          . "Here's what you can reply:\n\n"
          . "1️⃣ / *website*    — Website Development\n"
          . "2️⃣ / *courses*    — Web Dev Courses\n"
          . "3️⃣ / *content*    — Content Writing\n"
          . "4️⃣ / *automation* — Business Automation\n"
          . "5️⃣ / *contact*    — Contact Vinay\n\n"
          . "Or try keywords like: *price, portfolio, offer,*\n"
          . "*timeline, payment, refund, support, about*\n\n"
          . "_Type *menu* or *0* to see the full menu._";
    }

    // ── Send reply via WhatsApp Cloud API ────────────────────
    $url = "https://graph.facebook.com/v18.0/$phone_number_id/messages";

    $payload = json_encode([
        "messaging_product" => "whatsapp",
        "recipient_type"    => "individual",
        "to"                => $from,
        "type"              => "text",
        "text"              => [
            "preview_url" => false,
            "body"        => $reply
        ]
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST,           1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,     $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT,        20);
    curl_exec($ch);
    curl_close($ch);

    exit;
}
?>