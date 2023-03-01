<?php 
Route::set('index.php', function(){
    Index::CreateView('Index');
});
if($_REQUEST['url'] != ''){
    Route::set('home', function(){
        Index::CreateView('home');
    });
    Route::set('play', function(){
        Index::CreateView('play');
    });
    Route::set('gamereplay', function(){
        Index::CreateView('gamereplay');
    });
    
}
?>