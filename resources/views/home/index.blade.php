<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    <title>Form</title>
</head>
<body>
    <div class="container mt-5">
        <form id="myForm">
            <div class="mb-3">
                <input type="text" class="form-control" name="originUrl" placeholder="originUrl">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="s1" placeholder="Sub 1">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="s2" placeholder="Sub 2">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="s3" placeholder="Sub 3">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="s4" placeholder="Sub 4">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="s5" placeholder="Sub 5">
            </div>
            <button type="button" class="btn btn-primary" id="submitForm">Submit</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Server Response</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="responseMessage"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js"></script>
    <script>
      //  $(document).ready(function () {
      //       // Submit form via AJAX
      //       $("#myForm").submit(function (event) {
      //           event.preventDefault();

      //           $.get("/sort-link", $(this).serialize(), function (data) {
      //               $("#responseText").html(data);
      //               $("#myModal").modal();
      //           });
      //       });
      //   });
        $(document).ready(function () {
            $('#submitForm').on('click', function () {
                // Lấy dữ liệu từ biểu mẫu
                var formData = $('#myForm').serialize();

                // Gửi AJAX request đến máy chủ
                $.ajax({
                    type: 'GET',
                    url: '/sort-link', // Thay đổi thành URL của máy chủ
                    data: formData,
                    success: function (response) {
                        // Hiển thị phản hồi trong modal
                        $('#responseMessage').html(response);

                        // Mở modal
                        $('#myModal').modal('show');
                    }
                });
            });
        });
    </script>
</body>
</html>
