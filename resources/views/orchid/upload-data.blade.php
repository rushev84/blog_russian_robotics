<div class="bg-white rounded-top shadow-sm mb-4 rounded-bottom">
    <div class="row g-0">
        <div class="col col-lg-7 mt-6 p-4">
            <form id="upload-data" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" class="form-control" id="choose_xml" name="choose_xml">
                    <button type="button" id="upload-button" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("#upload-button").click(function() {
            var fileInput = $("#choose_xml")[0];
            var token =  '{{ csrf_token() }}';

            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var formData = new FormData();
                formData.append("choose_xml", file);
                formData.append("_token", token);

                $.ajax({
                    url: "/upload_data",
                    type: "POST",
                    data: formData,
                    processData: false, // Не обрабатывать данные
                    contentType: false, // Не устанавливать тип контента
                    success: function(response) {
                        // Обработка успешного ответа от сервера
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Обработка ошибки
                        console.error(error);
                    }
                });
            }
        });
    });
</script>

