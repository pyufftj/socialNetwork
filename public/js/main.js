// $('.post').find('.interaction').find('a').eq(2).on('click',function () {
//     $('#edit-modal').modal();
// });
var postId=0;
var postBodyElement= null;

$('.edit-post').on('click',function (event) {
    event.preventDefault();
    postBodyElement=event.target.parentNode.parentNode.childNodes[1];
    var post = postBodyElement.textContent;
    postId= event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(post);
   $('#edit-modal').modal();
});


$('#modal-save').on('click',function () {
    $.ajax({
        method:'POST',
        url: url,
        data:{body:$('#post-body').val(), postId:postId,_token: token}
    }).done(function (msg) {
        $(postBodyElement).text(msg['post_body']);
        $('#edit-modal').modal('hide');
    });
});

$('.like').on('click',function (event) {
    var isLike = event.target.previousElementSibling==null;
    postId= event.target.parentNode.parentNode.dataset['postid'];
    $.ajax({
        method:'POST',
        url:urlLike,
        data:{isLike:isLike,postId: postId,_token:token}
    }).done(function (msg) {
        //change the page;

    });
});