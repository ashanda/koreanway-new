


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

  



 