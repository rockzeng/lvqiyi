function Share2Sina(url, title,pattern)
{
    pattern = pattern.replace(/\[URL\]/g, url);
    pattern = pattern.replace(/\[TITLE\]/g, encodeURIComponent(title));
    var w = 776;
    var h = 436;
    var iWidth=400;
    var iHeight=400;
    var iTop = (window.screen.availHeight-30-iHeight)/2;
    var iLeft = (window.screen.availWidth-10-iWidth)/2;
    window.open(pattern, "socialBookmark", "top="+iTop+",left="+iLeft+",location=no,toolbar=0,status=0,scrollbars=1,resizable=no,width=" + w + ",height=" + h);
}