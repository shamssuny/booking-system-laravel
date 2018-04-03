<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    @stack('css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>

    @stack('js')

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand blue" href="">Ayojon.com</a>

            <ul class="nav navbar-nav navbar-left uppercase bold">
                @yield('leftNavContent')

            </ul>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right uppercase bold">

                {{--<li><a href="#" class=""> Demo</a></li>--}}
                {{--<li><a href="#" class=""> Demo</a></li>--}}
                {{--<li><a href="#"> Demo</a></li>--}}
                {{--<li><a href="#"> About</a></li>--}}
                {{--<li><a href="#"> Sign-in</a></li>--}}
                @if(Auth::check())
                    <li><a href="{{ url('/user') }}">Home</a></li>
                @elseif(Auth::guard('client')->check())
                    <li><a href="{{ url('/client') }}">Home</a></li>
                @endif
                @yield('rightNavContent')
                @if(Auth::check())
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{ App\User::find(Auth::id())->username }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                @elseif(Auth::guard('client')->check())
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{ App\Client::find(Auth::guard('client')->id())->username }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/client/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                @elseif(Auth::guard('admin')->check())
                    <li><a href="{{ url('auth/admin') }}">Dashboard</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, Admin<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('auth/logout') }}"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>


    <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
    </div>




<!-- Footer - Right Social/Left Menu -->




<footer>
    <div class="container">
        <div class="search-text">

        </div>
        <div class="row text-center">

            <div class="col-md-6 col-sm-6 col-xs-12 padding-t-1">
                <ul class="menu list-inline">

                    <li>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">About</a>
                    </li>

                    <li>
                        <a href="#">Blog</a>
                    </li>

                    <li>
                        <a href="#">Gallery</a>
                    </li>

                    <li>
                        <a href="#">Contact</a>
                    </li>

                </ul>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12">
                <ul class="list-inline">

                    <li>
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-dropbox fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-flickr fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-github fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-linkedin fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-tumblr fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
                    </li>

                </ul>
            </div>


        </div>
    </div>
</footer>


<div class="copyright">
    <div class="container">

        <div class="row text-center">
            <p class="bold">Copyright © 2018 All rights reserved</p>
        </div>

    </div>
</div>


<!-- footer End -->



<!-- body content  start -->
{{--Custom plugin for dropdown--}}
<script type="text/javascript">
    //code for make auto generated dropdown
    var Dhaka = ["Adabor","Airport","Badda","Banani","Bangshal","Bhashantek","Cantonment","Chackbazar","Darussalam","Daskhinkhan","Demra","Dhamrai","Dhanmondi","Dohar","Gandaria","Gulshan","Hazaribag","Jatrabari","Kafrul","Kalabagan","Kamrangirchar","Keraniganj","Khilgaon","Khilkhet","Kotwali","Lalbag","Mirpur Model","Mohammadpur","Motijheel","Mugda","Nawabganj","New Market","Pallabi","Paltan","Ramna","Rampura","Rupnagar","Sabujbag",
        "Savar","Shah Ali","Shahbag ","Shahjahanpur","Sherebanglanagar",
        "Shyampur","Sutrapur"];
    var Faridpur = ["Faridpur Sadar","Boalmari","Alfadanga","Madhukhali","Bhanga","Nagarkanda","Charbhadrasan","Sadarpur","Shaltha"];
    var Gazipur = ["Gazipur Sadar-Joydebpur","Kaliakior","Kapasia",
        "Sripur","Kaliganj","Tongi"];
    var Gopalgonj = ["Gopalganj Sadar","Kashiani","Kotalipara","Muksudpur","Tungipara"];
    var Kishorganj = ["Astagram","Bajitpur","Bhairab","Hossainpur",
        "Itna","Karimganj","Katiadi","Kishoreganj Sadar","Kuliarchar",
        "Mithamain","Nikli","Pakundia","Tarail"];
    var Madaripur = ["Madaripur Sadar","Kalkini","Rajoir","Shibchar"];
    var Manikganj = ["Manikganj Sadar","Singair","Shibalaya","Saturia","Harirampur","Ghior","Daulatpur"];
    var Munshiganj = ["Lohajang","Sreenagar","Munshiganj Sadar","Sirajdikhan","Tongibari","Gazaria"];
    var Narayanganj = ["Araihazar","Sonargaon","Bandar","Naryanganj Sadar","Rupganj","Siddirgonj"];
    var Narshingdi = ["Belabo","Monohardi","Narsingdi Sadar","Palash","Raipura","Narsingdi","Shibpur"];
    var Rajbari = ["Baliakandi","Goalandaghat","Pangsha","Kalukhali","Rajbari Sadar"];
    var Sariatpur = ["Shariatpur Sadar -Palong","Damudya","Naria","Jajira","Bhedarganj","Gosairhat"];
    var Tangail = ["Tangail Sadar","Sakhipur","Basail","Madhupur",
        "Ghatail","Kalihati","Mirzapur","Gopalpur","Delduar","Bhuapur",
        "Dhanbari"];
    var Bandarban = ["Bandarban Sadar","Thanchi","Lama","Naikhongchhari","Ali kadam","Rowangchhari","Ruma"];
    var Brahmanbaria = ["Brahmanbaria Sadar","Ashuganj","Nasirnagar","Nabinagar","Sarail","Shahbazpur Town","Kasba","Akhaura","Bancharampur","Bijoynagar"];
    var Chandpur = ["Chandpur Sadar","Faridganj","Haimchar","Haziganj","Kachua","Matlab Uttar","Matlab Dakkhin","Shahrasti"];
    var Chittagong = ["Anwara","Banshkhali","Boalkhali","Chandanaish","Fatikchhari","Hathazari","Lohagara","Mirsharai","Patiya","Rangunia","Raozan","Sandwip","Satkania","Sitakunda","Akborsha - Akborsha","Baijid bostami","Bakolia","Bandar","Chandgaon","Chokbazar","Doublemooring","EPZ","Hali Shohor","Kornafuli","Kotwali","Kulshi","Pahartali","Panchlaish","Potenga","Shodhorgat"];
    var Comilla = ["Barura","Brahmanpara","Burichong","Chandina","Chauddagram","Daudkandi","Debidwar","Homna","Comilla Sadar","Laksam","Monohorgonj","Meghna","Muradnagar","Nangalkot","Comilla Sadar South","Titas"];
    var Coxsbazar = ["Chakaria","Chakaria","Cox's Bazar Sadar","Kutubdia","Maheshkhali","Ramu","Teknaf","Ukhia","Pekua"];
    var  Feni = ["Feni Sadar","Chagalnaiya","Daganbhyan","Parshuram","Fhulgazi","Sonagazi"];
    var Khagrachari = ["Dighinala","Khagrachhari","Lakshmichhari","Mahalchhari","Manikchhari","Matiranga","Panchhari","Ramgarh"];
    var Laksmipur = ["Lakshmipur Sadar","Raipur","Ramganj","Ramgati","Komol Nagar"];
    var Noakhali = ["Noakhali Sadar","Begumganj","Chatkhil","Companyganj","Shenbag","Hatia","Kobirhat","Sonaimuri","Suborno Char"];
    var Rangamati = ["Rangamati Sadar","Belaichhari","Bagaichhari","Barkal","Juraichhari","Rajasthali","Kaptai","Langadu","Nannerchar","Kaukhali"];
    var Borguna = ["Amtali","Bamna","Barguna Sadar","Betagi","Patharghata","Taltali"];
    var Barishal = ["Muladi","Babuganj","Agailjhara","Barisal Sadar","Bakerganj","Banaripara","Gaurnadi","Hizla","Mehendiganj","Wazirpur","Airport","Kawnia","Bondor"];
    var Bhola = ["Bhola Sadar","Burhanuddin","Char Fasson","Daulatkhan","Lalmohan","Manpura","Tazumuddin"];
    var Jhalokathi = ["Jhalokati Sadar","Kathalia","Nalchity","Rajapur"];
    var Patuakhali = ["Bauphal","Dashmina","Galachipa","Kalapara","Mirzaganj","Patuakhali Sadar","Dumki","Rangabali"];
    var Pirojpur = ["Bhandaria","Kaukhali","Mathbaria","Nazirpur","Nesarabad","Pirojpur Sadar","Zianagar"];
    var Bagerhat = ["Bagerhat Sadar","Chitalmari","Fakirhat","Kachua","Mollahat","Mongla","Morrelganj","Rampal","Sarankhola"];
    var Chuadanga = ["Damurhuda","Chuadanga-S","Jibannagar","Alamdanga"];
    var Jessore = ["Abhaynagar","Keshabpur","Bagherpara","Jessore Sadar","Chaugachha","Manirampur","Jhikargachha","Sharsha"];
    var Jhenadiah = ["Jhenaidah Sadar","Maheshpur","Kaliganj","Kotchandpur","Shailkupa","Harinakunda"];
    var Khulna = ["Terokhada","Batiaghata","Dacope","Dumuria","Dighalia","Koyra","Paikgachha","Phultala","Rupsa","Aranghata","Daulatpur","Harintana","Horintana","Khalishpur","Khanjahan Ali","Khulna Sadar","Labanchora","Sonadanga"];
    var Kustia = ["Kushtia Sadar","Kumarkhali","Daulatpur","Mirpur","Bheramara","Khoksa"];
    var Magura = ["Magura Sadar","Mohammadpur","Shalikha","Sreepur"];
    var Meherpur = ["angni","Mujib Nagar","Meherpur-S"];
    var Narail = ["Narail-S Upazilla","Lohagara Upazilla","Kalia Upazilla"];
    var Satkhira = ["Satkhira Sadar","Assasuni","Debhata","Tala","Kalaroa","Kaliganj","Shyamnagar"];
    var Bogra = ["Adamdighi","Bogra Sadar","Sherpur","Dhunat","Dhupchanchia","Gabtali","Kahaloo","Nandigram","Sahajanpur","Sariakandi","Shibganj","Sonatala"];
    var Jaipurhat = ["Joypurhat Sadar","Akkelpur","Kalai","Khetlal","Panchbibi"];
    var Naogaon = ["Naogaon Sadar","Mohadevpur","Manda","Niamatpur","Atrai","Raninagar","Patnitala","Dhamoirhat","Sapahar","Porsha","Badalgachhi"];
    var Nator = ["Natore Sadar","Baraigram","Bagatipara","Lalpur","Natore Sadar","Baraigram"];
    var Chapainwabganj = ["Bholahat","Gomastapur","Nachole","Nawabganj Sadar","Shibganj"];
    var Panba = ["Atgharia","Bera","Bhangura","Chatmohar","Faridpur","Ishwardi","Pabna Sadar","Santhia","Sujanagar"];
    var Rajshahi = ["Bagha","Bagmara","Charghat","Durgapur","Godagari","Mohanpur","Paba","Puthia","Tanore","Boalia","Motihar","Shahmokhdum","Rajpara"];
    var Sirajganj = ["Sirajganj Sadar","Belkuchi","Chauhali","Kamarkhanda","Kazipur","Raiganj","Shahjadpur","Tarash","Ullahpara"];
    var Dinajpur = ["Birampur","Birganj","Biral","Bochaganj","Chirirbandar","Phulbari","Ghoraghat","Hakimpur","Kaharole","Khansama","Dinajpur Sadar","Nawabganj","Parbatipur"];
    var Gaibandha = ["Fulchhari","Gaibandha sadar","Gobindaganj","Palashbari","Sadullapur","Saghata","Sundarganj"];
    var Kurigram = ["Kurigram Sadar","Nageshwari","Bhurungamari","Phulbari","Rajarhat","Ulipur","Chilmari","Rowmari","Char Rajibpur"];
    var Lalmanirhat = ["Lalmanirhat Sadar","Aditmari","Kaliganj","Hatibandha","Patgram"];
    var Nilfamari = ["Nilphamari Sadar","Saidpur","Jaldhaka","Kishoreganj","Domar","Dimla"];
    var Panchagar = ["Panchagarh Sadar","Debiganj","Boda","Atwari","Tetulia"];
    var Rangpur = ["Badarganj","Mithapukur","Gangachara","Kaunia","Rangpur Sadar ","Pirgachha","Pirganj","Taraganj"];
    var Thakurgaon = ["Thakurgaon Sadar","Pirganj","Baliadangi","Haripur","Ranisankail"];
    var Habihganj = ["Ajmiriganj","Baniachang","Bahubal","Chunarughat","Habiganj Sadar","Lakhai","Madhabpur","Nabiganj","Shaistagonj"];
    var Maulavibazar = ["Moulvibazar Sadar","Barlekha","Juri","Kamalganj","Kulaura","Rajnagar","Sreemangal"];
    var Sunamganj = ["Bishwamvarpur","Chhatak","Derai","Dharampasha","Dowarabazar","Jagannathpur","Jamalganj","Sulla","Sunamganj Sadar","Shanthiganj","Tahirpur"];
    var Sylhet = ["Sylhet Sadar","Beanibazar","Bishwanath","Dakshin Surma","Balaganj","Companiganj","Fenchuganj","Golapganj","Gowainghat","Jaintiapur","Kanaighat","Zakiganj","Nobigonj","Airport","Hazrat Shah Paran","Jalalabad ","Kowtali","Moglabazar","Osmani Nagar","South Surma"];
    var Jamalpur = ["Dewanganj","Baksiganj","Islampur","Jamalpur Sadar","Madarganj","Melandaha","Sarishabari","Narundi Police I.C"];
    var Mymensing = ["Bhaluka","Trishal","Haluaghat","Muktagachha","Dhobaura","Fulbaria","Gaffargaon","Gauripur","Ishwarganj","Mymensingh Sadar","Nandail","Phulpur"];
    var Netrokona = ["Kendua Upazilla","Atpara Upazilla","Barhatta Upazilla","Durgapur Upazilla","Kalmakanda Upazilla","Madan Upazilla","Mohanganj Upazilla","Netrakona-S Upazilla","Purbadhala Upazilla","Khaliajuri Upazilla"];
    var Sherpur = ["Jhenaigati","Nakla","Nalitabari","Sherpur Sadar","Sreebardi"];
    $('#c').change(function () {
        var getValue = $(this).val();
//        if(getValue == 'Dhaka'){
//            $('#sc').html("");
//            for(var i=0;i<dhaka.length;i++){
//                $('#sc').append("<option value='"+dhaka[i]+"'>"+dhaka[i]+"</option>");
//            }
//        }else if(getValue == 'Chittagong'){
//            $('#sc').html("");
//            for(var i=0;i<chittagong.length;i++){
//                $('#sc').append("<option value='"+chittagong[i]+"'>"+chittagong[i]+"</option>");
//            }
//        }
        $('#sc').html("");
            for(var i=0;i<window[getValue].length;i++){
                $('#sc').append("<option value='"+window[getValue][i]+"'>"+window[getValue][i]+"</option>");
            }
    });
</script>


</body>
</html>
