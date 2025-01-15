<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ad->title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            color: #333;
            font-size: 12px; /* Reduced base font size */
        }

        h1 {
            text-align: center;
            font-size: 22px; /* Smaller title font */
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            font-size: 18px; /* Smaller subtitle font */
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        p {
            font-size: 12px;
            line-height: 1.4;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .details {
            background-color: #ffffff;
            padding: 10px; /* Reduced padding */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 15px; /* Reduced margin */
        }

        .details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .details li {
            font-size: 12px; /* Smaller text size */
            margin-bottom: 6px; /* Reduced spacing */
            display: flex;
            justify-content: space-between;
            padding: 3px 0; /* Reduced padding */
        }

        .details li strong {
            color: #2c3e50;
            font-weight: bold;
        }

        .price {
            font-size: 14px; /* Adjusted price size */
            color: #27ae60;
            font-weight: bold;
        }

        .signature-section {
            margin-top: 15px; /* Reduced margin */
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }

        .signature-box {
            width: 48%;
            padding: 5px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            text-align: center;
            background-color: #ffffff;
            height: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .signature-box p {
            margin: 0;
            font-style: italic;
            color: #7f8c8d;
            font-weight: bold;
            text-transform: uppercase;
        }

        .signature-box strong {
            margin-top: 5px;
            display: block;
            font-weight: bold;
            color: #2c3e50;
        }

        .contract-terms {
            font-size: 12px; /* Reduced font size for terms */
            line-height: 1.4;
            margin-top: 15px;
        }

        .contract-terms li {
            margin-bottom: 6px; /* Reduced spacing */
        }

        .img-container {
            text-align: center;
            margin-top: 10px;
        }

        .img-container img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .section-title {
            font-size: 14px; /* Adjusted section title size */
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            color: #2c3e50;
        }

        .campaign-info {
            text-align: center;
            font-size: 12px; /* Reduced font size */
            margin-top: 20px;
            color: #2c3e50;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-container svg {
            height: 60px;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 200" width="100" height="200">
            <!-- Eshikning asosiy tanasi -->
            <rect x="10" y="10" width="80" height="180" fill="gold" stroke="black" stroke-width="2" rx="5" ry="5"/>
            
            <!-- Eshikning ichki panellari -->
            <rect x="20" y="20" width="60" height="50" fill="none" stroke="black" stroke-width="1"/>
            <rect x="20" y="80" width="60" height="50" fill="none" stroke="black" stroke-width="1"/>
            <rect x="20" y="140" width="60" height="40" fill="none" stroke="black" stroke-width="1"/>
            
            <!-- Eshikning tutqichi -->
            <circle cx="75" cy="160" r="3" fill="black"/>
        </svg>
        
    </div>
    <h1>GOLD DOORS</h1>
    <h2>Eshik savdosi bo'yicha shartnoma</h2>

    </script>
    <p><strong>Mijoz ma'lumotlari:</strong> {{ $ad->customers_info }}</p>
    <p><strong>mijoz nomeri:</strong> {{ $ad->phone_number }}</p>

    <div class="details">
        <ul>
            <li><strong>Eshik turi:</strong> {{ $ad->doorType->name }}</li>
            <li><strong>Rangi:</strong> {{ $ad->color->name }}</li>
            <li><strong>Kengligi:</strong> {{ $ad->width }} sm</li>
            <li><strong>Bo'yi:</strong> {{ $ad->height }} sm</li>
            <li><strong>Ochilish tomoni:</strong> {{ $ad->doorDimension->opening_side }}</li>
            <li><strong>Eshik yuqori qismi:</strong> {{ $ad->hasTopSection->name }}</li>
            <li><strong>Eshik ramkasi:</strong> {{ $ad->doorFrame->name }}</li>
            <li><strong>Xizmat haqqi:</strong> {{ $ad->doorDimension->service_free }} </li>
            <li><strong>Eshik materiali:</strong> {{ $ad->material->name }} </li>
            <li><strong>Eshik qalinligi:</strong> {{ $ad->thickness }} </li>
            <li><strong>Eshik framogasi:</strong> {{ $ad->frame->name }} </li>
            <li><strong>Chegirma:</strong> {{ $ad->discount}} so'm </li>
            <li><strong>Yaratilgan vaqti:</strong> {{ $ad->created_at->format('Y-m-d H:i') }}</li>
            <li><strong>Narxi:</strong> <span class="price">{{ number_format($ad->price->price, 0, ',', ' ') }} so'm</span></li>

        </ul>
    </div>

    <div class="section-title">Shartlar va qoidalar</div>
    <ul class="contract-terms">
        <li><strong>1. To'lov shartlari:</strong> To'lov kelishuvdan so'ng 7 kun ichida amalga oshirilishi kerak.</li>
        <li><strong>2. Yetkazib berish:</strong> To'lov tasdiqlangandan so'ng 14 kun ichida amalga oshiriladi.</li>
        <li><strong>3. Kafolat:</strong> Mahsulot ishlab chiqarish nuqsonlari uchun bir yil kafolatlanadi.</li>
        <li><strong>4. Qaytarish:</strong> Qaytarish maxsus shartlar asosida 30 kun ichida qabul qilinadi.</li>
        <li><strong>5. Nizolar:</strong> Tegishli yurisdiktsiya qonunlariga muvofiq hal qilinadi.</li>
    </ul>

    <div class="signature-section">
        <div class="signature-box">
            <p>Vakolatli shaxs</p>
            <strong>Imzo:</strong>
        </div>
        <div class="signature-box">
            <p>Xaridor</p>
            <strong>Imzo:</strong>
        </div>
    </div>

    <div class="campaign-info">
        <p>Kampaniya haqida qisqacha ma'lumot: Eshik savdosi bo'yicha maxsus takliflar. Bizning xizmatlarimizni sinab ko'ring!</p>
        <p><strong>Telefon raqami:</strong> 97 777 77 77</p>
    </div>
</body>
</html>
