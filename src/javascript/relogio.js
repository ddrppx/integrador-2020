const clockContainer = document.querySelector('.clock-container');

const updateClock = () => {
    const present = new Date();
    const hours = present.getHours();
    const minutes = present.getMinutes();
    const seconds = present.getSeconds();

    const clockHTML = `
    ${String(hours).length === 1 ? `0${hours}`: `${hours}`}:${String(minutes).length === 1 ? `0${minutes}` : `${minutes}`}
    `;

    clockContainer.innerHTML = clockHTML;
}

const getClockHTML = (hours, minutes, seconds) => `
    ${formatTimeUnit}`

updateClock();

setInterval(updateClock, 1000);