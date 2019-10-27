@extends('candidate.layouts.master')
@section('myCss')
    <style>
        li {
            margin-left: 25px;
        }
    </style>
@endsection
@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb bgc-f0 pt30 pb30" aria-label="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="breadcrumb_title float-left">Terms and Conditions</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Terms and Policies -->
    <section class="our-terms-policy">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="fz20 mt0">Website Terms and Conditions</h4>
                    <p>
                        Welcome to {{ get_option('website_name') }}!
                        <br>
                        These terms and conditions outline the rules and regulations for the use of Company Name's Website, located at Website.com.<br>
                        By accessing this website we assume you accept these terms and conditions. Do not continue to use {{ get_option('website_name') }} if you do not agree to take all of the terms and conditions stated on this page.<br>
                        The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Client”, “You” and “Your” refers to you, the person log on this website and compliant to the Company's terms and conditions. The company refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client's needs in respect of provision of the Company's stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.<br>
                    </p>
                </div>
                <div class="col-lg-12">
                    <h4 class="fz20">Information on this Site</h4>
                    <p>Whilst we make every effort to ensure that the information on our Website is accurate and complete, some of the information is supplied to us by third parties and we are not able to check the accuracy or completeness of that information. We do not accept any liability arising from any inaccuracy or omission in any of the information on our Website or any liability in respect of information on the Website supplied by you, any other website user or any other person.</p>
                </div>
                <div class="col-lg-12">
                    <h4 class="fz20">Your Use of this Site</h4>
                    <p>You may only use the Website for lawful purposes when seeking employment or help with your career, when purchasing training courses or when recruiting staff. You must not under any circumstances seek to undermine the security of the Website or any information submitted to or available through it. In particular, but You must not under any circumstances seek to undermine the security of the Website or any information submitted to or available through it. In particular, but spamming or flooding, take any action or use any device, routine or software to crash, delay, damage or otherwise interfere with the operation of the Website or attempt to decipher, disassemble or modify any of the software, coding or information comprised in the Website.</p>
                    <p class="mt40 mb0">attempt to decipher, disassemble or modify any of the software, coding or information comprised in the Website.attempt to decipher, disassemble or modify any of the software, coding or information comprised in the Website.ful or in breach of any applicable legislation, regulations, guidelines or codes of practice or the copyright, trade mark or other intellectual property rights of any person in any jurisdiction. You are also responsible for ensuring that all information, data and files are free of viruses or other routines or engines that may person in any jurisdiction. You are also responsible for ensuring that all information, data and files are free of viruses or other routines or engines that may Website at our sole discretion, at any time and for any reason without being required to give any explanation.</p>
                </div>
                <div class="col-lg-12">
                    <h4 class="fz20">License</h4>
                    <p>
                        Unless otherwise stated, Company Name and/or its licensors own the intellectual property rights for all material on {{ get_option('website_name') }}. All intellectual property rights are reserved. You may access this from {{ get_option('website_name') }} for your own personal use subjected to restrictions set in these terms and conditions.<br>
                        You must not:
                        <ul>
                        <li>Republish material from {{ get_option('website_name') }}</li>
                        <li>Sell, rent or sub-license material from {{ get_option('website_name') }}</li>
                        <li>Reproduce, duplicate or copy material from {{ get_option('website_name') }}</li>
                        <li>Redistribute content from {{ get_option('website_name') }}</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
