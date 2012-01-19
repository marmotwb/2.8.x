/**
 *
 *  Scrollable HTML table
 *  http://www.webtoolkit.info/
 *  for Chrome, Safari, Opera
 *  http://s7u.blogspot.com/
 **/

 function ScrollableTable (tableEl, tableHeight, tableWidth) {
  tableHeight = tableHeight * screen.height * 0.01;
  this.initIEengine = function () {

   this.containerEl.style.overflowY = 'auto';
   if (this.tableEl.parentElement.clientHeight - this.tableEl.offsetHeight < 0) {
    this.tableEl.style.width = this.newWidth - this.scrollWidth +'px';
   } else {
    this.containerEl.style.overflowY = 'auto';
    this.containerEl.style.overflowX = 'hidden';
    this.tableEl.style.width = this.newWidth +'px';
   }

   if (this.thead) {
    var trs = this.thead.getElementsByTagName('tr');
    for (x=0; x < trs.length; x++) {
     trs[x].style.position ='relative';
     trs[x].style.setExpression("top",  "this.parentElement.parentElement.parentElement.scrollTop + 'px'");
    }
   }

   if (this.tfoot) {
    var trs = this.tfoot.getElementsByTagName('tr');
    for (x=0; x < trs.length; x++) {
     trs[x].style.position ='relative';
     trs[x].style.setExpression("bottom",  "(this.parentElement.parentElement.offsetHeight - this.parentElement.parentElement.parentElement.clientHeight - this.parentElement.parentElement.parentElement.scrollTop) + 'px'");
    }
   }

   eval("window.attachEvent('onresize', function () { document.getElementById('" + this.tableEl.id + "').style.visibility = 'hidden'; document.getElementById('" + this.tableEl.id + "').style.visibility = 'visible'; } )");
  };


  this.initFFengine = function () {
   this.containerEl.style.overflow = 'hidden';
   this.tableEl.style.width = this.newWidth + 'px';
   var headHeight = (this.thead) ? this.thead.clientHeight : 0;
   var footHeight = (this.tfoot) ? this.tfoot.clientHeight : 0;


   var bodyHeight = this.tbody.clientHeight;
   var trs = this.tbody.getElementsByTagName('tr');
   if (bodyHeight >= (this.newHeight - (headHeight + footHeight))) {
     this.tbody.style.overflow = 'scroll';
   }
   else {
  this.tbody.style.overflow = 'auto';
   }
   /*
    Chrome is built on Mozilla. Some script to assign width for tables dynamically.
   */
 var isChrome = (navigator.userAgent.toUpperCase().indexOf('MOZILLA')> -1 || navigator.userAgent.toUpperCase().indexOf('OPERA')> -1);

   if(isChrome){
    this.thead.style.display ="inline-block";
    this.tfoot.style.display ="inline-block";
    this.tbody.style.display ="inline-block";
    this.tbody.style.overflow ="auto";


    var count = trs[0].getElementsByTagName('th').length || trs[0].getElementsByTagName('td').length;
    var colArray = new Array(count);

    /*Thead*/
    trs = this.tableEl.getElementsByTagName('tr');
    for(var i=0; i < trs.length ; i++ ){
     var cols = trs[i].getElementsByTagName('th') || trs[i].getElementsByTagName('td');
     for(var j=0; j < cols.length ; j++){
      if(colArray[j]==null || colArray[j] < cols[j].clientWidth){
       colArray[j] =cols[j].clientWidth;
      }
     }
    }

    var sumArray=0;
    for(i =0; i < colArray.length; i++){
     sumArray += colArray[i];
    }

    /* if the width of any cell is greater */
    if (sumArray < (this.newWidth - this.scrollWidth)){
     var newCount =0;
     var nWidth =0;
     for(i =0; i < colArray.length; i++){
      var wid = (this.newWidth - this.scrollWidth)/count;
      if(wid < colArray[i]){
       newCount++;
       nWidth += colArray[i];
      }
     }
     var newWid = ((this.newWidth - this.scrollWidth) - nWidth)/(count-newCount);
     for(i =0; i < colArray.length; i++){
      var wid = (this.newWidth - this.scrollWidth)/count;
      if(wid >= colArray[i]){
       colArray[i]= newWid;
      }
     }
    }

    /*Thead */
    trs = this.thead.getElementsByTagName('tr');
    for(var i=0; i < trs.length ; i++ ){
     var cols = trs[i].getElementsByTagName('th')||trs[i].getElementsByTagName('td');
     for(var j=0; j < cols.length ; j++){
      cols[j].style.width = colArray[j] + 'px';
     }
     var tcell1 = trs[i].insertCell(cols.length);
     tcell1.setAttribute("width", this.scrollWidth -2 +'px' );
    }
    /*Tbody */
    trs = this.tbody.getElementsByTagName('tr');
    for(var i=0; i < trs.length ; i++ ){
     var cols = trs[i].getElementsByTagName('td');
     for(var j=0; j < cols.length ; j++){
      cols[j].style.width = colArray[j] + 'px';
     }
    }
    /*Tfoot */
    trs = this.tfoot.getElementsByTagName('tr');
    for(var i=0; i < trs.length ; i++ ){
     var cols = trs[i].getElementsByTagName('th')||trs[i].getElementsByTagName('td');
     for(var j=0; j < cols.length ; j++){
      cols[j].style.width = colArray[j] + 'px';
     }
     var tcell1 = trs[i].insertCell(cols.length);
     tcell1.setAttribute("width", this.scrollWidth -2 +'px');
    }

   }
   else{ // else block is for Firefox
    trs = this.tbody.getElementsByTagName('tr');
    for (x=0; x < trs.length; x++) {
     var tds = trs[x].getElementsByTagName('td');
     tds[tds.length-1].style.paddingRight += this.scrollWidth + 'px';
    }

   }

   var cellSpacing = (this.tableEl.offsetHeight - (this.tbody.clientHeight + headHeight + footHeight)) / 4;
   this.tbody.style.height = (this.newHeight - (headHeight + cellSpacing * 2) - (footHeight + cellSpacing * 2)) + 'px';

  };

  this.tableEl = tableEl;
  this.scrollWidth = 16;

  this.originalHeight = this.tableEl.clientHeight;
  this.originalWidth = this.tableEl.clientWidth;

  this.newHeight = parseInt(tableHeight);
  this.newWidth = tableWidth ? parseInt(tableWidth) : this.originalWidth;

  this.tableEl.style.height = 'auto';
  this.tableEl.removeAttribute('height');

  this.containerEl = this.tableEl.parentNode.insertBefore(document.createElement('div'), this.tableEl);
  this.containerEl.appendChild(this.tableEl);
  this.containerEl.style.height = this.newHeight + 'px';
  this.containerEl.style.width = this.newWidth + 'px';


  var thead = this.tableEl.getElementsByTagName('thead');
  this.thead = (thead[0]) ? thead[0] : null;

  var tfoot = this.tableEl.getElementsByTagName('tfoot');
  this.tfoot = (tfoot[0]) ? tfoot[0] : null;

  var tbody = this.tableEl.getElementsByTagName('tbody');
  this.tbody = (tbody[0]) ? tbody[0] : null;

  if (!this.tbody) return;
   this.containerEl.style.overflow = 'auto';

  if (document.all && document.getElementById && !window.opera) this.initIEengine();
  if (!document.all && document.getElementById ) this.initFFengine();


 }
