window.dateManager = {
    Today: null,
    NewDate: null,
    HasNewDate: false,
    Months: ["Januari", "Februari", "March", "April", "May", "Juni", "Juli", "August", "September", "October", "November", "December"],

    // Show the date of now
    Now: function (format) {
        // Haal de gegevens op
        var date = new Date();

        // geef de property eenw waarde als het null is
        if (this.Today === null) {
            console.log("Not null");
            this.Today = date;
        }

        switch (format) {
            case 0:
                // Return d/m/y
                return date.getDate() + '/' + this.Months[date.getMonth()] + '/' + date.getFullYear();
                break;

            default:
                case 1:
                    return date.getFullYear() + '/' + this.Months[date.getMonth()] + '/' + date.getDate();
                    break;
        }    
    },

    // Show the time
    Time: function () {
        var date = new Date();

        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();

        return hours + ':' + minutes + ':' + seconds;
    },

    // Validation date
    ValidDate: function (d) {
        if ( Object.prototype.toString.call(d) === "[object Date]" ) {
            // it is a date
            if ( isNaN( d.getTime() ) ) {  // d.valueOf() could also work
              // date is not valid
              return false;
            }
            else {
              // date is valid
              return true;
            }
        }
        else {
          // not a date
          return true;
        }
    },
    
    normalDate: function (date) {
        return date.getDate() + " " + this.Months[date.getMonth()] + " " + date.getFullYear();
    },
    
    addDay: function (date, days) {
        var used_date = null;
        
        // Assign the given date or the date of today
        if (date !== undefined) {
            used_date = date;
            
            // Validate the date
            var valid = this.ValidDate(used_date);
            
            // If not valid return false
            if (!valid) {
                console.log("invalid date");
                return false;
            }
        } else {
            // Assign the date of today
            used_date = new Date();
        }
        
        // check if variable isn't undefined and is numeric
        if(days === undefined || isNaN(days)) {
            console.log("wrong days");
            return false;
        }
        
        // Add the days
        used_date.setDate(days);
        
        // assign the new date to the property
        this.NewDate = used_date;
        
        return this.normalDate(used_date);
    },
    
    addMonth: function (date, months) {
        var used_date = null;
        
        // Assign the given date or the date of today
        if (date !== undefined) {
            used_date = date;
            
            // Validate the date
            var valid = this.ValidDate(used_date);
            
            // If not valid return false
            if (!valid) {
                return false;
            }
        } else {
            // Assign the date of today
            used_date = new Date();
        }
        
        // check if variable isn't undefined and is numeric
        if(months === undefined || isNaN(months)) {
            return false;
        }
        
        console.log(used_date);
        
        // Add the months
        used_date.setMonth(months);
        
        // assign the new date to the property
        this.NewDate = used_date;
        
        return this.normalDate(used_date);
    },
    
    AddYear: function (date, years) {
        var used_date = null;
        
        // Assign the given date or the date of today
        if (date !== undefined) {
            used_date = date;
            
            // Validate the date
            var valid = this.ValidDate(used_date);
            
            // If not valid return false
            if (!valid) {
                return false;
            }
        } else {
            // Assign the date of today
            used_date = new Date();
        }
        
        // check if variable isn't undefined and is numeric
        if(years === undefined || isNaN(years)) {
            return false;
        }
        
        // Add the months
        used_date.setFullYears(years);
        
        // assign the new date to the property
        this.NewDate = used_date;
        
        return this.normalDate(used_date);
    }
};