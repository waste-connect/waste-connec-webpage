const services = [
    {
        image: "/images/green residential dumpster.png",
        title: "Garbage Pickup for home",
        description: "Residential Recycling is available in many areas where we offer garbage pickup.",
        colorClass: "green",
         link: "/residential-services"
    },
    {
        image: "/images/commercial dumpster.png",
        title: "Commercial Services",
        description: "Our Commercial Waste Collection service provides your business with a range of dumpsters and service schedules to meet your needs.",
        colorClass: "blue",
         link: "/commercial-services",
         Style: 'display'
    },
    
    {
        image: "/images/roll off dumpster.png",
        title: "Dumpster Rental",
        description: "Our Roll Off Dumpster services offer a range of container sizes suitable for commercial, residential, and construction needs.",
        colorClass: "black",
        link: "/dumpster-rental"
    }
];

const serviceCardsContainer = document.getElementById('serviceCardsContainer');

services.forEach(service => {
    const serviceCard = document.createElement('a');
    serviceCard.href = service.link;
    serviceCard.className = `service-box ${service.colorClass}`;
    serviceCard.innerHTML = `
        <div class="service-box p-4">
            <div class="flex flex-col gap-4">
                <img class="w-20" src="${service.image}" alt="${service.title}">
                <div class="flex gap-4 items-center">
                    <h2 class="font-medium text-3xl title-${service.colorClass}">${service.title}</h2>
                    <img src="/svg" alt="" class="ml-auto">
                </div>
                <p>${service.description}</p>
            </div>
        </div>
    `;
    serviceCardsContainer.appendChild(serviceCard);
});



  
function toggleMenu() {
    const menu = document.getElementById('menu');
    if (menu.classList.contains('show')) {
        menu.classList.remove('show');
        setTimeout(() => {
            menu.style.display = 'none'; // Hide after transition
        }, 500); // Match timeout with the CSS transition duration
    } else {
        menu.style.display = 'flex'; // Make it flex before adding class
        setTimeout(() => {
            menu.classList.add('show');
        }, 10); // Small timeout to allow the display property to take effect
    }
}

// Close the menu when clicking outside
window.onclick = function(event) {
    const menu = document.getElementById('menu');
    if (!event.target.matches('.toggle') && menu.classList.contains('show')) {
        menu.classList.remove('show');
        setTimeout(() => {
            menu.style.display = 'none'; // Hide after transition
        }, 500); // Match timeout with the CSS transition duration
    }
};
