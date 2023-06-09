


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

$(document).ready(function () {
	var batchSelect = $('#batch'); // Cache the batch select element

	// On page load, trigger the AJAX request for the default course
	loadBatches($('#course').val());

	// Handle the course selection change event
	$('#course').on('change', function () {
		var courseId = $(this).val();
		loadBatches(courseId);
	});

	// Function to load batches based on the selected course ID
	function loadBatches(courseId) {
		var url = '/get_batch/' + courseId; // Update the URL based on your routes

		$.ajax({
			url: url,
			method: 'GET',
			dataType: 'json',
			success: function (data) {
				batchSelect.empty(); // Clear the existing options

				// Append the default option


				// Append the new batch options
				$.each(data, function (index, batch) {
					batchSelect.append($('<option></option>')
						.val(batch.id)
						.text(batch.name));
				});
			},
			error: function (xhr, status, error) {
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

function closeModel(){
	$('#paymentModal').modal('hide');
}
function closeHistoryModel(){
	$('#payment-history-modal').modal('hide');
}
function closeEditModel(){
	$('#editModal').modal('hide');
}

$(document).ready(function () {
	$('.edit-btn').click(function () {
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
$(document).ready(function () {
	// Set up CSRF token for AJAX requests
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// Handle form submission
	$('#editForm').submit(function (event) {
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
			success: function (response) {
				Swal.fire({
					icon: 'success',
					title: 'Success!',
					text: 'Payment updated successfully.',
					showConfirmButton: false,
					timer: 2000 // Display the success message for 2 seconds
				}).then(function () {
					// Perform any necessary actions after the success message
					location.reload(); // Example: Reload the page
				});
			},
			error: function (xhr, status, error) {
				// Handle the error response from the server
				console.error(xhr.responseText);
				// Perform any necessary actions (e.g., show an error message, etc.)
			}
		});
	});
});

$(document).ready(function () {
	// Include the CSRF token in AJAX request headers
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// Click event handler for the "Payment History" button
	$('#payment-history-btn').click(function () {
		var id = $(this).data('id'); // Retrieve the ID value from the data-id attribute

		// Make an AJAX call to retrieve payment history
		$.ajax({
			url: '/payment-history/' + id,
			type: 'GET',
			dataType: 'json',
			success: function (data) {
				var paymentHistoryModel = data; // Assuming your model is the data object itself
				var paymentTable = $('#payment-history-table');

				// Clear any existing content in the payment table body
				paymentTable.find('tbody').empty();

				// Loop through the data and generate table rows
				for (var i = 0; i < paymentHistoryModel.length; i++) {
					// Create a closure or a separate function to encapsulate the iteration scope
					(function (payment) {
						// Make AJAX calls to retrieve course, batch, and teacher data using their respective IDs
						$.ajax({
							url: '/get-course-data/' + payment.course_id,
							type: 'GET',
							dataType: 'json',
							success: function (courseData) {
								// Make another AJAX call to retrieve batch data using batch ID
								$.ajax({
									url: '/get-batch-data/' + payment.batch_id,
									type: 'GET',
									dataType: 'json',
									success: function (batchData) {
										// Make another AJAX call to retrieve teacher data using teacher ID
										$.ajax({
											url: '/get-teacher-data/' + payment.teacher_id,
											type: 'GET',
											dataType: 'json',
											success: function (teacherData) {
												var tableRow = $('<tr>');
												var courseCell = $('<td>').text(courseData.name);
												var batchCell = $('<td>').text(batchData.name);
												var teacherCell = $('<td>').text(teacherData.name);
												var planCell = $('<td>').text(payment.plan);
												var paymentTypeCell = $('<td>').text(payment.payment_type);
												var amountCell = $('<td>').text(payment.amount);

												tableRow.append(courseCell, batchCell, teacherCell, planCell, paymentTypeCell, amountCell);
												paymentTable.append(tableRow);
											},
											error: function (xhr, status, error) {
												// Handle any errors that occur during the AJAX call
												console.error('AJAX Error:', error);
											}
										});
									},
									error: function (xhr, status, error) {
										// Handle any errors that occur during the AJAX call
										console.error('AJAX Error:', error);
									}
								});
							},
							error: function (xhr, status, error) {
								// Handle any errors that occur during the AJAX call
								console.error('AJAX Error:', error);
							}
						});
					})(paymentHistoryModel[i]);
				}

				// Show the modal
				$('#payment-history-modal').modal('show');
			},
			error: function (xhr, status, error) {
				// Handle any errors that occur during the AJAX call
				console.error('AJAX Error:', error);
			}
		});
	});
});

function submit() {
	let forms = document.getElementsByClassName("form");
	for (var i = 0; i < forms.length; i++) {
		forms[i].submit();
	}
}




