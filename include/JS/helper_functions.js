
// *********************************************************************************************************************************
//this function accepts a month ihn number and it return the short name version of it
// *********************************************************************************************************************************

function getMonthShortName(monthNumber){

    let months= ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    return months[monthNumber];

}

// *********************************************************************************************************************************

function getToday(){

    let date = new Date();
    let day = date.getDate().toString().padStart(2, "0");
    let month = (date.getMonth() + 1).toString().padStart(2, "0");
    let year = date.getFullYear();
    
    return year+"-"+month+"-"+day;
}

// *********************************************************************************************************************************
