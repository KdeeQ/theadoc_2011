

function updateY() {
  var s = window.location + "";
  if (s.indexOf("&y=") >= 0) {
    for (var i = 0; i < 10000; ++i) {
      if (s.indexOf("&y=" + i) >= 0) {
        s = s.replace("&y=" + i, "&y=" + (++i));
        return s;
      }
    } 
  }
  return s + "&y=1";
}
