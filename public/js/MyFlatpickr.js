flatpickr('.datepickerBillet', {
  altInput: true,
  altFormat: 'j F Y',
  dateFormat: 'Y-m-d H:i:s',
  locale: 'fr',
  disable: [
        function(date) {
          var dateNow = new Date();
          var myDateNow = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate());
          var myDate = date.getFullYear()+"/"+ (date.getMonth()+1) +"/"+date.getDate();
          var myBadeDate1 = date.getFullYear()+"/5/1";
          var myBadeDate2 = date.getFullYear()+"/11/1";
          var myBadeDate3 = date.getFullYear()+"/12/25";

            if (myDate === myBadeDate1 || myDate === myBadeDate2 || myDate === myBadeDate3){
              return true;
            }
          
            if (date.getDay() === 2){
              return true;
            }
            if (date < myDateNow){
              return true;
            }
            return false;

        }
    ],

})

flatpickr('.datepickerBirth', {
  altInput: true,
  altFormat: 'j F Y',
  dateFormat: 'Y-m-d H:i:s',
  locale: 'fr',


})
