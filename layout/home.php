




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function render(){
          $.ajax({
                url: '/api/v1/product/list', // Đường dẫn API của bạn
                method: 'GET',
                success: function(products) {
                    $('#app').empty();
                    $('#app').append(products);
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi gọi API: ' + error);
                }
            });
        }


        window.addEventListener('load', function() {
            render();
        });



        function edit(id){
            $.ajax({
              url: 'Controller/product/getProduct.php',
              method:"GET",
              data:{
                'id' : id,
              },
              success:function(data){
                $('#modal-edit-product').addClass('d-block');
                var src = './storage/product/'+data.img+'';
                $('#img-product').attr('src',src);
                $('textarea[name=title]').val(data.name);
                $('textarea[name=content]').val(data.content);
                $('input[name=price]').val(data.price);
                $('.btn-primary[data-product-id]').val(data.id);
              }
            })
        }


        function clickE(){
            var img = $('#img-product').attr('src');
            var id = $('.btn-primary').val();
            var name = $('textarea[name=title]').val();
            var content =  $('textarea[name=content]').val();
            var price = $('input[name=price]').val();
            console.log(id,img,name,content,price);
            $.ajax({
              url: 'api/v1/product/update',
              method: 'POST',
              data:{
                name: name,
                id : id,
                content : content,
                price: price,

              },
              success:function(){
                render();
              }
            })
        }

        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('img-product');
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function erase(id){
          $.ajax({
              url: '/api/v1/product/erase',
              method: 'POST',
              data:{
                'id' : id,
              },
              success:function(){
                render();
              }

          })
        }
    </script>

