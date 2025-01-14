// Function to handle checkbox click
const serviceOptions = document.querySelectorAll('.service-option');
const greenResidential2 = document.getElementById("green-residential2");
const blueBusiness1 = document.getElementById("blue-business1");

serviceOptions.forEach(option => {
    const checkbox = option.querySelector('input[type="checkbox"]');
    option.addEventListener('click', function() {
        // Toggle the background color based on checkbox state
        if (checkbox.checked) {
            // If checked, remove the background color and text color
            this.classList.remove('bg-green-300', 'bg-blue-600', 'text-white'); // Remove both colors
            checkbox.checked = false; // Uncheck the checkbox
            // Reset SVG color to default
            if (checkbox.classList.contains('service-checkbox')) {
                greenResidential2.classList.remove("svg-color"); // Reset SVG color
            } else {
                blueBusiness1.classList.remove("svg-color"); // Reset SVG color
            }
        } else {
            // If unchecked, remove active class from all options
            serviceOptions.forEach(opt => {
                opt.classList.remove('bg-green-300', 'bg-blue-600', 'text-white'); 
                // Remove both colors
                opt.querySelector('input[type="checkbox"]').checked = false;
                 // Uncheck all checkboxes

                // Reset SVG color to default
                const svg = opt.querySelector('svg');
                svg.classList.remove("svg-color"); // Reset SVG color
            });
            // Add active class to the clicked option
            if (checkbox.classList.contains('service-checkbox')) {
                this.classList.add('bg-green-300', 'text-white'); 
                // Green background for the first checkbox and white text
                greenResidential2.classList.add("svg-color"); 
                // Change SVG color to white
            } else {
                this.classList.add('bg-blue-600', 'text-white');
                 // Blue background for the second checkbox and white text
                blueBusiness1.classList.add("svg-color"); 
                // Change SVG color to white
            }
            checkbox.checked = true; 
            // Check the checkbox
        }
    });
});