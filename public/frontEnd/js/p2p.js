function senderInfoVerification() {
    var firstErrorOccurance = '';
    var sender_name = $('#shipping-form [name="sender_name"]').val();
    var sender_mobile = $('#shipping-form [name="sender_mobile"]').val();
    var sender_email = $('#shipping-form [name="sender_email"]').val();
    var sender_pickuptown = $('#shipping-form [name="sender_pickuptown"]').val();
    var sender_pickupcity = $('#shipping-form [name="sender_pickupcity"]').val();
    var sender_address = $('#shipping-form [name="sender_address"]').val();

    console.log(sender_name);

    if (
        sender_name != "" && sender_name != undefined && sender_name != null &&
        sender_mobile != "" && sender_mobile != undefined && sender_mobile != null &&
        sender_email != "" && sender_email != undefined && sender_email != null &&
        sender_pickuptown != "" && sender_pickuptown != undefined && sender_pickuptown != null &&
        sender_pickupcity != "" && sender_pickupcity != undefined && sender_pickupcity != null &&
        sender_address != "" && sender_address != undefined && sender_address != null
    ) {

        var email_pattern = /^[^_.-][\w-._]+@[a-zA-Z_-]+?(\.[a-zA-Z]{2,26}){1,3}$/;
        var mobile_pattern = /^(?:\+?88)?01[13-9]\d{8}$/;
        if (sender_email.match(email_pattern) == null) {
            $('.sender_email_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_email';
        } else if (sender_mobile.match(mobile_pattern) == null) {
            $('.sender_mobile_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_mobile';
        } else {
            fbq('track', 'P2PSenderInfoReceived');
            $('.sender_name_error').hide();
            $('.sender_mobile_error').hide();
            $('.sender_email_error').hide();
            $('.sender_district_error').hide();
            $('.sender_pickupcity_error').hide();
            $('.sender_address_error').hide();
            firstErrorOccurance = '';
            slideItem('step-02');
            updateStepperZidrop(2);
        }
    } else {
        
        if (sender_name == '' || sender_name == undefined || sender_name == null) {
            $('.sender_name_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_name';
        } else {
            $('.sender_name_error').hide();
        }
        
        if (sender_mobile == '' || sender_mobile == undefined || sender_mobile == null) {
            $('.sender_mobile_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_mobile';
        } else {
            $('.sender_mobile_error').hide();
        }
        
        if (sender_email == '' || sender_email == undefined || sender_email == null) {
            $('.sender_email_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_email';
        } else {
            $('.sender_email_error').hide();
        }
        
        if (sender_pickuptown == '' || sender_pickuptown == undefined || sender_pickuptown == null) {
            $('.sender_district_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_district';
        } else {
            $('.sender_district_error').hide();
        }
        
        if (sender_pickupcity == '' || sender_pickupcity == undefined || sender_pickupcity == null) {
            $('.sender_pickupcity_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_pickupcity';
        } else {
            $('.sender_pickupcity_error').hide();
        }
        
        if (sender_address == '' || sender_address == undefined || sender_address == null) {
            $('.sender_address_error').show();
            firstErrorOccurance = (firstErrorOccurance)?firstErrorOccurance : 'sender_address';
        } else {
            $('.sender_address_error').hide();
        }
    }
	
	if(firstErrorOccurance){
		$('[name="'+firstErrorOccurance+'"]').focus();
		$('html, body').animate({
			scrollTop: $('[name="'+firstErrorOccurance+'"]').offset().top - 100 + 'px'
		}, 'fast');
		
	}	
}

function gotoSenderDetail() {
    slideItem('step-01');
    $('#otp_section_booking').hide();
    $('.otp-input #otp0').val('');
    $('.otp-input #otp1').val('');
    $('.otp-input #otp2').val('');
    $('.otp-input #otp3').val('');
}

function slideItem(step) {
    // Hide all steps
    $('.slide-content').hide();
    
    // Show the selected step
    $('#' + step).show();

    // Update navigation indicators (if applicable)
    $('.step-nav ul li').removeClass('active');
    $('.step-nav ul li').each(function() {
        if ($(this).text().trim() === step) {
            $(this).addClass('active');
        }
    });
}


function checkMobileTypeRecipient(mobile) {
    var mobile_pattern = /^(?:((00)|\+)?(88))?(01)[13-9][0-9]{8}$/;
    if (mobile.match(mobile_pattern) == null) {
        $('.recipient_mobile_error').css('display', 'block');
    } else {
        $('.recipient_mobile_error').css('display', 'none');
    }
}

function checkMobileTypeSender(mobile) {
    var mobile_pattern = /^(?:((00)|\+)?(88))?(01)[13-9][0-9]{8}$/;
    if (mobile.match(mobile_pattern) == null) {
        $('.sender_mobile_error').css('display', 'block');
    } else {
        $('.sender_mobile_error').css('display', 'none');
    }
}

function checkEmailType(mobile) {

    var email_pattern = /^[^_.-][\w-._]+@[a-zA-Z_-]+?(\.[a-zA-Z]{2,26}){1,3}$/;
    if (mobile.match(email_pattern) == null) {
        $('.sender_email_error').show();
    } else {
        $('.sender_email_error').hide();
    }
}

function getSenderAddressInfo(){
	var address_type = $('#shipping-form [name="address_type"]:checked').val();
	if(address_type != "" && address_type != null && address_type != undefined){		
		
		$.ajax({
			url: "https://ecourier.com.bd/wp-content/themes/ecourier-2.0/p2p-sender-address-type.php?address_type=" +
                    address_type,
                headers: {
                    "Accept": "application/json"
                },
                crossDomain: true
        }).done(function(dataSet) {
			dataSet = JSON.parse(dataSet);
            if(dataSet.success){
				//console.log(dataSet.data.district)
				$('#shipping-form [name="sender_district"]').val(dataSet.data.district).trigger('change');
				$('#shipping-form [name="sender_area_loggin"]').val(dataSet.data.area);
				$('#shipping-form [name="sender_postcode"]').val(dataSet.data.postcode);
				$('#sender_postcode').html(dataSet.data.postcode);
				$('#shipping-form [name="sender_thana"]').val(dataSet.data.thana);
				$('#shipping-form [name="sender_address"]').val(dataSet.data.address);
			} else {
				//console.log('2');
				if(dataSet.status!='fail'){
					$('#shipping-form [name="sender_district"]').val('').trigger('change');;
					var option = '<option value="">Select Area</option>';
					$('#shipping-form [name="sender_area"]').html(option);
					$('#shipping-form [name="sender_area"]').val('').trigger('change');;
					$('#shipping-form [name="sender_postcode"]').val('');
					$('#shipping-form [name="sender_thana"]').val('');
					$('#shipping-form [name="sender_address"]').val('');
					$('#shipping-form [name="sender_area_loggin"]').val('');
					$('#sender_postcode').html('');
				}				
			}	 		
        });
	}         
}

function getPackagingService(){
	var packaging_service = $('#shipping-form [name="packaging_service"]:checked').val();
	var parcel_type = $('#shipping-form [name="parcel_type"]').val();
	var parcel_weight = $('#shipping-form [name="parcel_weight"]').val();
	var number_of_item = $('#shipping-form [name="number_of_item"]').val();
	
	if((packaging_service==1 && parcel_type == 'Parcel' && parcel_weight != null && parcel_weight != '' && parcel_weight != undefined)||(
	packaging_service==1 && parcel_type != 'Parcel' && number_of_item != null && number_of_item != '' && number_of_item != undefined && parcel_type != null && parcel_type != '' && parcel_type != undefined
	)){
		var parcelType = parcel_type.split('+')
		var quantity = 1;
		if(parcelType[0] == 'Parcel'){
			quantity = parcel_weight;
		} else {
			quantity = number_of_item;
		}
	
		$.ajax({
            url: url + '/package-charge?parcel_type='+parcelType[0]+'&quantity_or_weight=' + quantity,
        }).done(function(data) {
            if (data.success && data.data > 0) {
				$('.packaging-service-value').html('BDT '+data.data+' Added');
				$('#packaging_service_charge').val(data.data);
				$("#packaging_service_yes").prop("checked", true);
				$("#packaging_service_no").prop("checked", false);
				$('.packaging-service-value').show();
            } else {
				$('.packaging-service-value').hide();
				$('.packaging-service-value').html('BDT 0 Taka');
				$('#packaging_service_charge').val('0');
				$("#packaging_service_no").prop("checked", true);
				$("#packaging_service_yes").prop("checked", false);
            }
        });
		
	} else {
		$('.packaging-service-value').hide();
		$('.packaging-service-value').html('BDT 0 Added');
		$('#packaging_service_charge').val('0');
		$("#packaging_service_no").prop("checked", true);
		$("#packaging_service_yes").prop("checked", false);
	}	
}

function numberOfItemField(){
	getPackagingService();
}


function changeParcelWeight(){
	getPackagingService();
}
function checkNumeric(id) {
    var p = /\D/g;
    if (id.value.match(/\D/)){
		id.value = id.value.replace(p, "");
	} 
}

// Form validation functions
function validateSenderInfo() {
    let isValid = true;
    const senderName = $('#sender_name').val().trim();
    const senderMobile = $('#sender_mobile').val().trim();
    const senderEmail = $('#sender_email').val().trim();
    const senderCity = $('#sender_pickupcity').val();
    const senderTown = $('#sender_pickuptown').val();
    const senderAddress = $('#sender_address').val().trim();

    // Reset error messages
    $('.invalid-feedback').hide();

    // Validate sender name
    if (!senderName) {
        $('.sender_name_error').show();
        isValid = false;
    }

    // Validate sender mobile (11 digit Nigerian number)
    const mobileRegex = /^(\+234|0)[789][01]\d{8}$/;
    if (!senderMobile || !mobileRegex.test(senderMobile.replace(/\s+/g, ''))) {
        $('.sender_mobile_error').show();
        isValid = false;
    }

    // Validate sender email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!senderEmail || !emailRegex.test(senderEmail)) {
        $('.sender_email_error').show();
        isValid = false;
    }

    // Validate sender city
    if (!senderCity) {
        $('.sender_pickupcity_error').show();
        isValid = false;
    }

    // Validate sender town
    if (!senderTown) {
        $('.sender_district_error').show();
        isValid = false;
    }

    // Validate sender address
    if (!senderAddress) {
        $('.sender_address_error').show();
        isValid = false;
    }

    return isValid;
}

function validateRecipientInfo() {
    let isValid = true;
    const recipientName = $('#recivier_name').val().trim();
    const recipientMobile = $('#recivier_mobile').val().trim();
    const recipientCity = $('#recipient_pickupcity').val();
    const recipientTown = $('#recipient_pickuptown').val();
    const recipientAddress = $('#recivier_address').val().trim();

    // Reset error messages
    $('.invalid-feedback').hide();

    // Validate recipient name
    if (!recipientName) {
        $('.recipient_name_error').show();
        isValid = false;
    }

    // Validate recipient mobile (11 digit Nigerian number)
    const mobileRegex = /^(\+234|0)[789][01]\d{8}$/;
    if (!recipientMobile || !mobileRegex.test(recipientMobile.replace(/\s+/g, ''))) {
        $('.recipient_mobile_error').show();
        isValid = false;
    }

    // Validate recipient city
    if (!recipientCity) {
        $('.recipient_pickupcity_error').show();
        isValid = false;
    }

    // Validate recipient town
    if (!recipientTown) {
        $('.recipient_district_error').show();
        isValid = false;
    }

    // Validate recipient address
    if (!recipientAddress) {
        $('.recipient_address_error').show();
        isValid = false;
    }

    return isValid;
}

function validateParcelInfo() {
    let isValid = true;
    const parcelType = $('#parcel_type').val();
    const packageWeight = $('#package_weight').val();
    const numberOfItems = $('#number_of_items').val();
    const declaredValue = $('#declared_value').val();
    const itemName = $('#item_name').val().trim();
    const itemColor = $('#item_color').val().trim();
    const parcelContents = $('#parcel_contents').val().trim();

    // Reset error messages
    $('.invalid-feedback').hide();

    // Validate parcel type
    if (!parcelType) {
        $('.parcel_type_error').show();
        isValid = false;
    }

    // Validate package weight
    if (!packageWeight || packageWeight <= 0) {
        $('.package_weight_error').show();
        isValid = false;
    }

    // Validate number of items
    if (!numberOfItems || numberOfItems < 1) {
        $('.number_of_items_error').show();
        isValid = false;
    }

    // Validate declared value
    if (!declaredValue || declaredValue <= 0) {
        $('.declared_value_error').show();
        isValid = false;
    }

    // Validate item name
    if (!itemName) {
        $('.item_name_error').show();
        isValid = false;
    }

    // Validate item color
    if (!itemColor) {
        $('.item_color_error').show();
        isValid = false;
    }

    // Validate parcel contents
    if (!parcelContents) {
        $('.parcel_contents_error').show();
        isValid = false;
    }

    return isValid;
}

function validateReviewInfo() {
    let isValid = true;
    const termsAccepted = $('#terms_conditions').is(':checked');

    // Reset error messages
    $('.invalid-feedback').hide();

    // Validate terms and conditions
    if (!termsAccepted) {
        $('.terms_conditions_error').show();
        isValid = false;
    }

    return isValid;
}

// Navigation functions
function slideItem(step) {
    $('.slide-content').hide();
    $('#' + step).show();

    // Update stepper
    $('.step-circle').removeClass('bg-primary text-white').addClass('bg-light text-secondary');
    $('.step-label').removeClass('text-primary').addClass('text-secondary');
    
    const stepNumber = step.split('-')[1];
    for (let i = 1; i <= stepNumber; i++) {
        $(`.step:nth-child(${i * 2 - 1}) .step-circle`).removeClass('bg-light text-secondary').addClass('bg-primary text-white');
        $(`.step:nth-child(${i * 2 - 1}) .step-label`).removeClass('text-secondary').addClass('text-primary');
    }
}

// ZiDrop stepper progression functions
function updateStepper(currentStep) {
    // Reset all steps
    $('.stepper-zidrop .step').removeClass('active completed');
    
    // Mark completed steps
    for (let i = 1; i < currentStep; i++) {
        $(`.stepper-zidrop .step:nth-child(${i})`).addClass('completed');
    }
    
    // Mark current step as active
    $(`.stepper-zidrop .step:nth-child(${currentStep})`).addClass('active');
}

function updateStepperZidrop(currentStep) {
    // Reset all
    $('.step-circle-zidrop').removeClass('active');
    $('.step-text-zidrop').removeClass('active');
    $('.progress-line-zidrop').removeClass('active');
    
    // Set active steps
    $('.step-circle-zidrop').each(function(index) {
        if (index + 1 <= currentStep) {
            $(this).addClass('active');
        }
    });
    
    $('.step-text-zidrop').each(function(index) {
        if (index + 1 <= currentStep) {
            $(this).addClass('active');
        }
    });
    
    $('.progress-line-zidrop').each(function(index) {
        if (index + 1 < currentStep) {
            $(this).addClass('active');
        }
    });
}

function slideItem(stepId) {
    $('.slide-content').hide();
    $('#' + stepId).show();
    
    let stepNumber = 1;
    if (stepId === 'step-02') stepNumber = 2;
    else if (stepId === 'step-03') stepNumber = 3;
    else if (stepId === 'step-04') stepNumber = 4;
    
    updateStepperZidrop(stepNumber);
}

// Form submission functions
function senderInfoVerification() {
    if (validateSenderInfo()) {
        slideItem('step-02');
    }
}

function recipientInfoVerification() {
    if (validateRecipientInfo()) {
        slideItem('step-03');
    }
}

function parcelInfoVerification() {
    if (validateParcelInfo()) {
        updateReviewSection();
        slideItem('step-04');
    }
}

function updateReviewSection() {
    // Update sender details
    $('#sender_name_t').text($('#sender_name').val());
    $('#sender_mobile_t').text($('#sender_mobile').val());
    $('#sender_email_t').text($('#sender_email').val());
    $('#sender_pickupcity_t').text($('#sender_pickupcity option:selected').text());
    $('#sender_pickuptown_t').text($('#sender_pickuptown option:selected').text());
    $('#sender_address_t').text($('#sender_address').val());

    // Update recipient details
    $('#recivier_name_t').text($('#recivier_name').val());
    $('#recivier_mobile_t').text($('#recivier_mobile').val());
    $('#recipient_pickupcity_t').text($('#recipient_pickupcity option:selected').text());
    $('#recipient_pickuptown_t').text($('#recipient_pickuptown option:selected').text());
    $('#recivier_address_t').text($('#recivier_address').val());

    // Update parcel details
    $('#parcel_type_t').text($('#parcel_type option:selected').text());
    $('#package_weight_t').text($('#package_weight').val() + ' kg');
    $('#number_of_items_t').text($('#number_of_items').val());
    $('#item_name_t').text($('#item_name').val());
    $('#item_color_t').text($('#item_color').val());
    $('#parcel_contents_t').text($('#parcel_contents').val());

    // Calculate charges
    const weight = parseFloat($('#package_weight').val());
    const declaredValue = parseFloat($('#declared_value').val());
    const baseCharge = 1000; // Base delivery charge
    const weightCharge = weight > 1 ? (weight - 1) * 500 : 0; // Additional charge per kg after first kg
    const insuranceRate = 0.01; // 1% insurance rate
    const taxRate = 0.075; // 7.5% tax rate

    const deliveryCharge = baseCharge + weightCharge;
    const insurance = declaredValue * insuranceRate;
    const tax = (deliveryCharge + insurance) * taxRate;
    const total = deliveryCharge + insurance + tax;

    // Update charges
    $('#delivery_charge_t').text('₦' + deliveryCharge.toLocaleString());
    $('#insurance_t').text('₦' + insurance.toLocaleString());
    $('#tax_t').text('₦' + tax.toLocaleString());
    $('#total_t').text('₦' + total.toLocaleString());

    // Store total amount for payment
    $('#totalamount').val(total);
}

function confirmAndPay() {
    if (validateReviewInfo()) {
        // Proceed with payment
        payWithPaystack(event);
    }
}

// Initialize form
$(document).ready(function() {
    // Initialize select2
    $('.select2').select2({
        theme: 'bootstrap-5'
    });

    // Handle city change for sender
    $('#sender_pickupcity').change(function() {
        const cityId = $(this).val();
        if (cityId) {
            loadTowns(cityId, '#sender_pickuptown');
        } else {
            $('#sender_pickuptown').html('<option value="">Pickup Town</option>');
        }
    });

    // Handle city change for recipient
    $('#recipient_pickupcity').change(function() {
        const cityId = $(this).val();
        if (cityId) {
            loadTowns(cityId, '#recipient_pickuptown');
        } else {
            $('#recipient_pickuptown').html('<option value="">Pickup Town</option>');
        }
    });

    // Format mobile numbers
    $('#sender_mobile, #recivier_mobile').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 0) {
            if (value.startsWith('234')) {
                value = '0' + value.substring(3);
            }
            if (value.length > 11) {
                value = value.substring(0, 11);
            }
            $(this).val(value.replace(/(\d{4})(?=\d)/g, '$1 '));
        }
    });

    // Format declared value
    $('#declared_value').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 0) {
            $(this).val(parseInt(value).toLocaleString());
        }
    });
});

// Load towns based on selected city
function loadTowns(cityId, targetSelect) {
    $.ajax({
        url: '/api/towns/' + cityId,
        type: 'GET',
        success: function(response) {
            let options = '<option value="">Pickup Town</option>';
            response.forEach(function(town) {
                options += `<option value="${town.id}">${town.title}</option>`;
            });
            $(targetSelect).html(options);
        },
        error: function(xhr) {
            console.error('Error loading towns:', xhr);
        }
    });
}