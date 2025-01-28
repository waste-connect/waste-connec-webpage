const services = [
    {
        image: "./images/green residential dumpster.png",
        title: "Garbge Pickup for home",
        description: "Residential Recycling is available in many areas where we offer garbage pickup.",
        colorClass: "green",
        link: "./residential-services"
    },
    {
        image: "./images/commercial dumpster.png",
        title: "Commercial Services",
        description: "Our Commercial Waste Collection service provides your business with a range of dumpsters and service schedules to meet your needs.",
        colorClass: "blue",
        link: "./commercial-services",
        Style: 'display'
    },

    {
        image: "./images/roll off dumpster.png",
        title: "Dumpster Rental",
        description: "Our Roll Off Dumpster services offer a range of container sizes suitable for commercial, residential, and construction needs.",
        colorClass: "black",
        link: "./dumpster-rental"
    },

    {
        image: "./images/security_icon.png",
        title: "Dumpster Rental",
        description: "Our Roll Off Dumpster services offer a range of container.",
        colorClass: "black",
        link: "./dumpster-rental"
    }
];

const serviceCardsContainer = document.getElementById('serviceCardsContainer');

services.forEach(service => {
    const serviceCard = document.createElement('a');
    serviceCard.href = service.link;
    serviceCard.className = `service-box ${service.colorClass}`;
    serviceCard.innerHTML = `
        <div class="p-4">
            <div class="flex flex-col gap-4">
                <img class="w-20" style="width: 80px;" src=".${service.image}" alt="${service.title}">
                <div class="flex gap-4 items-center">
                    <h2 class="font-medium text-3xl title-${service.colorClass}">${service.title}</h2>
               
                    <svg class="svg" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" >
  <path d="M16.1 7.06667L9.43333 0.4C8.9 -0.133333 8.1 -0.133333 7.56667 0.4C7.03333 0.933333 7.03333 1.73333 7.56667 2.26667L11.9667 6.66667H1.83333C1.03333 6.66667 0.5 7.2 0.5 8C0.5 8.8 1.03333 9.33333 1.83333 9.33333H11.9667L7.56667 13.7333C7.03333 14.2667 7.03333 15.0667 7.56667 15.6C8.1 16.1333 8.9 16.1333 9.43333 15.6L16.1 8.93333C16.6333 8.53333 16.6333 7.6 16.1 7.06667Z" fill="green"></path>
</svg>

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
window.onclick = function (event) {
    const menu = document.getElementById('menu');
    if (!event.target.matches('.toggle') && menu.classList.contains('show')) {
        menu.classList.remove('show');
        setTimeout(() => {
            menu.style.display = 'none'; // Hide after transition
        }, 500); // Match timeout with the CSS transition duration
    }
};
