function include(file)
{

  var script  = document.createElement('script');
  script.src  = file;
  script.type = 'text/javascript';
  script.defer = true;

  document.getElementsByTagName('head').item(0).appendChild(script);

}

//var root = location.protocol + '//' + location.host +'/'; // online
 var root = location.protocol + '//' + location.host +'/Tic_tac_toe_Peerawat/'; // offline
// include(root+'app/core/loginJS.js');
// include(root+'app/core/action2.js');
// include(root+'app/core/action.js');
 include(root+'app/core/search_ajax.js');
// include(root+'app/core/on_javascript.js');
include(root+'index.js');



// include(root+'app/Views/scripts.js');




