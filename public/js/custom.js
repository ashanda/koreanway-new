// === Dropdown === //

$('.ui.dropdown')
  .dropdown()
;

// === Model === //
$('.ui.modal')
  .modal({
    blurring: true
  })
  .modal('show')
;

// === Tab === //
$('.menu .item')
  .tab()
;

// === checkbox Toggle === //
$('.ui.checkbox')
  .checkbox()
;

// === Toggle === //
$('.enable.button')
  .on('click', function() {
    $(this)
      .nextAll('.checkbox')
        .checkbox('enable')
    ;
  })
;


// Home Live Stream
$('.live_stream').owlCarousel({
	items:10,
	loop:false,
	margin:10,
	nav:true,
	dots:false,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:2
		},
		600:{
			items:3
		},
		1000:{
			items:3
		},
		1200:{
			items:5
		},
		1400:{
			items:6
		}
	}
})

// Featured Courses home
$('.featured_courses').owlCarousel({
	items:10,
	loop:false,
	margin:20,
	nav:true,
	dots:false,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:1
		},
		1200:{
			items:2
		},
		1400:{
			items:3
		}
	}
})

// Featured Courses home
$('.top_instrutors').owlCarousel({
	items:10,
	loop:false,
	margin:20,
	nav:true,
	dots:false,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:1
		},
		1200:{
			items:2
		},
		1400:{
			items:3
		}
	}
})

// Student Says
$('.Student_says').owlCarousel({
	items:10,
	loop:false,
	margin:30,
	nav:true,
	dots:false,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:2
		},
		1200:{
			items:3
		},
		1400:{
			items:3
		}
	}
})

// features Careers
$('.feature_careers').owlCarousel({
	items:4,
	loop:false,
	margin:20,
	nav:true,
	dots:false,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:1
		},
		1000:{
			items:1
		},
		1200:{
			items:1
		},
		1400:{
			items:1
		}
	}
})

/*Floating Code for Iframe Start*/
if (jQuery('iframe[src*="https://www.youtube.com/embed/"],iframe[src*="https://player.vimeo.com/"],iframe[src*="https://player.vimeo.com/"]').length > 0) {
	/*Wrap (all code inside div) all vedio code inside div*/
	jQuery('iframe[src*="https://www.youtube.com/embed/"],iframe[src*="https://player.vimeo.com/"]').wrap("<div class='iframe-parent-class'></div>");
	/*main code of each (particular) vedio*/
	jQuery('iframe[src*="https://www.youtube.com/embed/"],iframe[src*="https://player.vimeo.com/"]').each(function(index) {

		/*Floating js Start*/
		var windows = jQuery(window);
		var iframeWrap = jQuery(this).parent();
		var iframe = jQuery(this);
		var iframeHeight = iframe.outerHeight();
		var iframeElement = iframe.get(0);
		windows.on('scroll', function() {
			var windowScrollTop = windows.scrollTop();
			var iframeBottom = iframeHeight + iframeWrap.offset().top;
			//alert(iframeBottom);

			if ((windowScrollTop > iframeBottom)) {
				iframeWrap.height(iframeHeight);
				iframe.addClass('stuck');
				jQuery(".scrolldown").css({"display": "none"});
			} else {
				iframeWrap.height('auto');
				iframe.removeClass('stuck');
			}
		});
		/*Floating js End*/
	});
}

/*Floating Code for Iframe End*/

// expand/collapse all Start

var headers = $('#accordion .accordion-header');
var contentAreas = $('#accordion .ui-accordion-content ').hide()
.first().show().end();
var expandLink = $('.accordion-expand-all');

// add the accordion functionality
headers.click(function() {
    // close all panels
    contentAreas.slideUp();
    // open the appropriate panel
    $(this).next().slideDown();
    // reset Expand all button
    expandLink.text('Expand all')
        .data('isAllOpen', false);
    // stop page scroll
    return false;
});

// hook up the expand/collapse all
expandLink.click(function(){
    var isAllOpen = !$(this).data('isAllOpen');
    console.log({isAllOpen: isAllOpen, contentAreas: contentAreas})
    contentAreas[isAllOpen? 'slideDown': 'slideUp']();
    
    expandLink.text(isAllOpen? 'Collapse All': 'Expand all')
                .data('isAllOpen', isAllOpen);    
});


// Payment Method Accordion
$('input[name="paymentmethod"]').on('click', function () {
	var $value = $(this).attr('value');
	$('.return-departure-dts').slideUp();
	$('[data-method="' + $value + '"]').slideDown();
});


// === Radio buttons Tabs=== //

// Share post popup radio buttons
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".share-box").not(targetBox).hide();
        $(targetBox).show();
    });
});

// Video Lecture popup radio buttons
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".video-box").not(targetBox).hide();
        $(targetBox).show();
    });
});

// Quiz popup radio buttons
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".quiz-box").not(targetBox).hide();
        $(targetBox).show();
    });
});

// Intro Box popup radio buttons
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".intro-box").not(targetBox).hide();
        $(targetBox).show();
    });
});

// === Custom Toggle Menu For Top Nav === //

$(document).on('click', 'a.nav-icon-list', function(e) {
	e.preventDefault();
	$('.lecture-sidebar').toggle();
});



function changeInputs() {
	var x = document.getElementById("classtype").value;

	if (x == 'Schedule') {
		document.getElementById("schedule").style.display = "block";
		document.getElementById("tute").style.display = "none";
		document.getElementById("video").style.display = "none";
	} else if (x == 'Tute') {
		document.getElementById("tute").style.display = "block";
		document.getElementById("schedule").style.display = "none";
		document.getElementById("video").style.display = "none";
	} else if (x == 'Video') {
		document.getElementById("video").style.display = "block";
		document.getElementById("tute").style.display = "none";
		document.getElementById("schedule").style.display = "none";
	}
}

$(document).ready(function() {
    var batchSelect = $('#batch'); // Cache the batch select element

    // On page load, trigger the AJAX request for the default course
    loadBatches($('#course').val());

    // Handle the course selection change event
    $('#course').on('change', function() {
        var courseId = $(this).val();
        loadBatches(courseId);
    });

    // Function to load batches based on the selected course ID
    function loadBatches(courseId) {
        var url = '/get_batch/' + courseId ; // Update the URL based on your routes

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                batchSelect.empty(); // Clear the existing options

                // Append the default option
               

                // Append the new batch options
                $.each(data, function(index, batch) {
                    batchSelect.append($('<option></option>')
                        .val(batch.id)
                        .text(batch.name));
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});


function openModel(course_id, batch_id, teacher_id) {
	$('.course_id').val(course_id);
    $('.batch_id').val(batch_id);
    $('.teacher_id').val(teacher_id);
    $('#paymentModal').modal('show');
  }

  $(document).ready(function() {
	$('.edit-btn').click(function() {
	  var image = $(this).data('image');
	  var id = $(this).data('id');
	  var amount = $(this).data('amount');
  
	  // Update modal inputs and image
	  $('.paymentId').val(id);
	  $('.paymentAmount').val(amount);
	  $('.paymentImage').attr('src', image);
  
	  // Open the modal
	  $('#editModal').modal('show');
	});
  });
  $(document).ready(function() {
	// Set up CSRF token for AJAX requests
	$.ajaxSetup({
	  headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
  
	// Handle form submission
	$('#editForm').submit(function(event) {
	  event.preventDefault(); // Prevent the default form submission
	  
	  // Collect the form data
	  var formData = {
		paymentId: $('.paymentId').val(),
		paymentAmount: $('.paymentAmount').val(),
		paymentStart: $('[name="paymentstart"]').val(),
		paymentEnd: $('[name="paymentend"]').val(),
		paymentStatus: $('#paymentType').val()
		// Add more fields as needed
	  };
	  var paymentId = $('.paymentId').val();
	  var url = '/payment/' + paymentId;
	  // Submit the form data via Ajax
	  $.ajax({
		url: url, // Replace with the actual URL for submitting the form
		type: 'POST',
		data: formData,
		success: function(response) {
			Swal.fire({
				icon: 'success',
				title: 'Success!',
				text: 'Payment updated successfully.',
				showConfirmButton: false,
				timer: 2000 // Display the success message for 2 seconds
			  }).then(function() {
				// Perform any necessary actions after the success message
				location.reload(); // Example: Reload the page
			  });
		  },
		error: function(xhr, status, error) {
		  // Handle the error response from the server
		  console.error(xhr.responseText);
		  // Perform any necessary actions (e.g., show an error message, etc.)
		}
	  });
	});
  });




 