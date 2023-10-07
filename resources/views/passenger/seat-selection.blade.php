<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .seat-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            padding: 20px;
        }

        .row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-left: 100px;
        }

        .seat {
            width: 40px;
            height: 40px;
            background-color: #e5e5e5;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .gap-row {
            margin-bottom: 50px;
        }

        .space {
            margin-left: 80px;
        }

        .seat.driver {
            background-color: #007bff;
            color: #fff;
        }

        .seat i {
            margin-right: 5px;
            color:black;
            text-decoration: none;
        }
    </style>
</head>

<body>


    <div class="container">
        <h1 class="mt-3">Seat Selection</h1>
        <div class="seat-container">
            <div class="row">

                <a class="seat"><i class="fas fa-chair">3</i></a>
                <a class="seat"><i class="fas fa-chair">7</i></a>
                <a class="seat"><i class="fas fa-chair">11</i></a>
                <a class="seat"><i class="fas fa-chair">15</i></a>
                <a class="seat"><i class="fas fa-chair">19</i></a>
                <a class="seat"><i class="fas fa-chair">23</i></a>
                <a class="seat"><i class="fas fa-chair">27</i></a>
                <div class="space"></div>
                <a class="seat"><i class="fas fa-chair">31</i></a>
                <a class="seat"><i class="fas fa-chair">35</i></a>
                <a class="seat"><i class="fas fa-chair">39</i></a>
                <a class="seat"><i class="fas fa-chair">43</i></a>
                <a class="seat"><i class="fas fa-chair">47</i></a>
            </div>
            <!-- <div class="row gap-row"></div> Gap between rows 1 and 2 -->
            <div class="row">
                <a class="seat"><i class="fas fa-chair">4</i></a>
                <a class="seat"><i class="fas fa-chair">8</i></a>
                <a class="seat"><i class="fas fa-chair">12</i></a>
                <a class="seat"><i class="fas fa-chair">16</i></a>
                <a class="seat"><i class="fas fa-chair">20</i></a>
                <a class="seat"><i class="fas fa-chair">24</i></a>
                <a class="seat"><i class="fas fa-chair">28</i></a>
                <div class="space"></div>
                <a class="seat"><i class="fas fa-chair">32</i></a>
                <a class="seat"><i class="fas fa-chair">36</i></a>
                <a class="seat"><i class="fas fa-chair">40</i></a>
                <a class="seat"><i class="fas fa-chair">44</i></a>
                <a class="seat"><i class="fas fa-chair">48</i></a>
            </div>
        </div>
        <div class="row">
        <div style="margin-left:650px"></div>
            <a class="seat"><i class="fas fa-chair">51</i></a>
        </div>

        <!-- Gap between rows 2 and 3 -->
        <div class="seat-container">
            <div class="row">
            <div style="margin-left:40px"></div>
                <a class="seat"><i class="fas fa-chair">2</i></a>
                <a class="seat"><i class="fas fa-chair">6</i></a>
                <a class="seat"><i class="fas fa-chair">10</i></a>
                <a class="seat"><i class="fas fa-chair">14</i></a>
                <a class="seat"><i class="fas fa-chair">18</i></a>
                <a class="seat"><i class="fas fa-chair">22</i></a>
                <a class="seat"><i class="fas fa-chair">26</i></a>
                <a class="seat"><i class="fas fa-chair">30</i></a>
                <a class="seat"><i class="fas fa-chair">34</i></a>
                <a class="seat"><i class="fas fa-chair">38</i></a>
                <a class="seat"><i class="fas fa-chair">42</i></a>
                <a class="seat"><i class="fas fa-chair">46</i></a>
                <a class="seat"><i class="fas fa-chair">50</i></a>
            </div>

            <div class="row">
                <div class="seat driver">
                    <i class="fas fa-car"></i>
                </div>
                <a href="#" class="seat"><i class="fas fa-chair">1</i></a>
                <a class="seat"><i class="fas fa-chair">5</i></a>
                <a class="seat"><i class="fas fa-chair">9</i></a>
                <a class="seat"><i class="fas fa-chair">13</i></a>
                <a class="seat"><i class="fas fa-chair">17</i></a>
                <a class="seat"><i class="fas fa-chair">21</i></a>
                <a class="seat"><i class="fas fa-chair">25</i></a>
                <a class="seat"><i class="fas fa-chair">29</i></a>
                <a class="seat"><i class="fas fa-chair">33</i></a>
                <a class="seat"><i class="fas fa-chair">37</i></a>
                <a class="seat"><i class="fas fa-chair">41</i></a>
                <a class="seat"><i class="fas fa-chair">45</i></a>
                <a class="seat"><i class="fas fa-chair">49</i></a>
            </div>
        </div>
    </div>
 


</body>

</html>