<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_bottm">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="fotb_left">
                                <li>
                                    <p> Copyrights <script>
                                            document.write(new Date().getFullYear())
                                        </script>

                                        © {{ config('app.name', 'Laravel') }} | Website by <a target="_blank" title="Click to visit" href="https://yogeemedia.com/">yogeemedia.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

<!-- Data table JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.5.3/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.5.3/js/autoFill.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> -->
  <!-- <script>
    $(document).ready(function() {
      $('#student-name').select2();
    });
  </script> -->

<script>
    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

  // Include the CSRF token in all Ajax requests
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': csrfToken
    }
  });

  $('#student-name').change(function() {
    var studentId = $(this).val();
    if (studentId) {
      // Make an Ajax request to fetch related course information
      $.ajax({
        url: '/fetch-courses', // Replace with the actual URL to fetch courses
        type: 'GET',
        data: { student_id: studentId },
        success: function(response) {
          // Update the course field with the fetched data
          $('#course-id').html(response); // Use .html() to set the options

          
        },
        error: function(xhr, status, error) {
          console.log(error); // Handle any errors
        }
      });
    } else {
      // Clear the course field and teacher ID input if no student is selected
      $('#course-id').html('<option value="">Select a course</option>');
      $('input[name="teacher_id"]').val('');
    }
  });

  $('#course-id').change(function() {
    var courseId = $(this).val();
    var userId = $('#student-name').val();
    var selectedCourse = $('#course-id option:selected');
    var teacherId = selectedCourse.data('teacher-id'); // Get the teacher ID from the data attribute
    $('input[name="teacher_id"]').val(teacherId).attr('value', teacherId);
    
    if (courseId && userId) {
      // Make an Ajax request to fetch related batch information
      $.ajax({
        url: '/fetch-batches', // Replace with the actual URL to fetch batches
        type: 'GET',
        data: { course_id: courseId, user_id: userId },
        success: function(response) {
          // Update the batch field with the fetched data
          $('#batch-id').html(response); // Use .html() to set the options
        },
        error: function(xhr, status, error) {
          console.log(error); // Handle any errors
        }
      });
    } else {
      // Clear the batch field if no course is selected
      $('#batch-id').html('<option value="">Select a batch</option>');
    }
  });

    });
  </script>
  
  