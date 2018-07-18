(function(){
    disableSelectLanguages();
    removeAddNewButtonFromEditPost();
    removeWebsiteFialdOfUserProfile();
})()

function disableSelectLanguages(){
    // var tr_langs = document.getElementsByClassName("tr_lang")
    // for (var i = 0; i < tr_langs.length; i++) { 
    //     tr_langs[i].disabled = true
    // }
    // var post_lang_choice = document.getElementById("post_lang_choice")
    // if(post_lang_choice) post_lang_choice.disabled = true
    // var term_lang_choice = document.getElementById("term_lang_choice")
    // if(term_lang_choice) term_lang_choice.disabled = true
    // var media_lang_choice = document.getElementsByClassName("media_lang_choice")
    // if(media_lang_choice) if(media_lang_choice[0]) media_lang_choice[0].style.display = 'none'
}

function removeAddNewButtonFromEditPost(){
    var current_url = window.location.href;
    if(current_url.indexOf('action=edit') !== -1){
        var add_new_button = document.getElementsByClassName("page-title-action")
        if(add_new_button) if(add_new_button[0]) add_new_button[0].style.display = 'none'
    }
}

function removeWebsiteFialdOfUserProfile(){
    var url = document.querySelector("#createuser #url")
    if(url){
        url.parentNode.parentNode.style.display = 'none'
    }
}