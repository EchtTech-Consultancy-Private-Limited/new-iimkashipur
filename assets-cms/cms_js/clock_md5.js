function rotateClockHands() {
    const now = new Date();
    const seconds = now.getSeconds();
    const minutes = now.getMinutes();
    const hours = now.getHours();

    const secondHand = document.querySelector(".second-hand");
    const minuteHand = document.querySelector(".minute-hand");
    const hourHand = document.querySelector(".hour-hand");

    const secondHandDegree = (seconds / 60) * 360;
    const minuteHandDegree = (minutes / 60) * 360 + (seconds / 60) * 6;
    const hourHandDegree = ((hours % 12) / 12) * 360 + (minutes / 60) * 30;

    secondHand.style.transform = `rotate(${secondHandDegree}deg)`;
    minuteHand.style.transform = `rotate(${minuteHandDegree}deg)`;
    hourHand.style.transform = `rotate(${hourHandDegree}deg)`;
  }

  setInterval(rotateClockHands, 1000);