(function() {
  tinymce.create('tinymce.plugins.flickree', {
    init : function(ed, url) {
      ed.addCommand('mceFlickree', function() {
        ed.windowManager.open({
          file : url + '/tinymce.html',
          width : 480,
          height : 320,
          inline : 1,
          title : 'Add flickree gallery'
        }, {});
      });
      ed.addButton('flickree', {
        cmd : 'mceFlickree',
        image : url + '/tinymce.png'
      });
    },
    getInfo : function() {
      return {
        longname : 'Flickree plugin',
        author : 'Ben Cooling',
        authorurl : 'http://bcooling.com.au',
        infourl : 'http://bcooling.com.au/tinymce',
        version : "1.0"
      };
    }
  });
  tinymce.PluginManager.add('flickree', tinymce.plugins.flickree);
})();