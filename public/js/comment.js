$(document).ready(() => {
    var documentId = $('#document_id').val();
    var userId = $('#user_id').val();
    setInterval (function () {
        $.get('/get/comments/'+documentId, function (data, status) {
            $('.comment-row').empty();
            data.forEach(element => {
                $('.comment-row').append(`
                    <div class="row comment-line">
                        <div class="col-md-1">
                            <div class="avatar-user-comment">
                                <img class="img-responsive" src="${'/storage/avatars/'+element.user.avatar}" alt="">
                            </div>
                        </div>
                        <div class="col-md-11">
                            <div class="comment-content">
                                <div class="comment-username">
                                    <h5>${element.user.name}</h5>
                                </div>
                                <div class="comment-date"><span>${element.created_at}</span></div> 
                            </div>
                            <div class="comment-messages">
                                <p>${element.messages}</p>
                            </div>
                        </div>
                    </div>
                `);
            });
        });
    }, 1000);
    
    $('#bt_comment').click(function () {
        var message = $('#comment_messages').val();
        $('#comment_messages').val('');
        $.ajax({
            type: "POST",
            url: '/post/comment',
            dataType: 'json',
            data: {
                user_id: userId,
                document_id: documentId,
                messages: message,
            }, 
            success: function(data) {
            }
        });
    });
});
