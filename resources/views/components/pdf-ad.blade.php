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
        }

        h4 {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            line-height: 1.4;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .details {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .details li {
            font-size: 14px;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }

        .details li strong {
            color: #2c3e50;
            font-weight: bold;
        }

        .price {
            font-size: 18px;
            color: #27ae60;
            font-weight: bold;
        }

        .signature-section {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
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
            font-size: 14px;
            line-height: 1.4;
            margin-top: 15px;
        }

        .contract-terms li {
            margin-bottom: 8px;
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
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <h2>Eshik savdosi bo'yicha kelishuv</h2>
       <h2>{{ $ad->title }}</h2>  
    <p><strong>Tavsif:</strong> {{ $ad->description }}</p>
    <p><strong>mijoz ta'rif:</strong> {{ $ad->customers_info }}</p>

    <div class="details">
        <ul>
            <li><strong>Rangi:</strong> {{ $ad->colors->name }}</li>
            <li><strong>Kengligi:</strong> {{ $ad->doorDimensions->width }} sm</li>
            <li><strong>Bo'yi:</strong> {{ $ad->doorDimensions->height }} sm</li>
            <li><strong>Materiali:</strong> {{ $ad->doorDimensions->material }}</li>
            <li><strong>Ochilish tomoni:</strong> {{ $ad->doorDimensions->opening_side }}</li>
            <li><strong>Xizmat haqqi:</strong> {{ $ad->doorDimensions->service_fee }} uzs</li>
            <li><strong>Eshik turi:</strong> {{ $ad->doorTypes->name }}</li>
            <li><strong>Yaratilgan vaqti:</strong> {{ $ad->created_at->format('Y-m-d H:i') }}</li>
            <li><strong>Narxi:</strong> <span class="price">{{ $ad->price }} uzs</span></li>
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
</body>
</html>
