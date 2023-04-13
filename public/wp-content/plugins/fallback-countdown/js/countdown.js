const countDownDate = new Date("2023-04-20 00:00:00").getTime();
const calculateTimeLeft = (countDownDate) => {
  const now = new Date().getTime();
  let distance = countDownDate - now;

  let days = Math.floor(distance / (1000 * 60 * 60 * 24));
  let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((distance % (1000 * 60)) / 1000);

  return [days, hours, minutes, seconds, distance];
};
let template = (timeLeft) => {
  if (timeLeft[4] < 0) {
    return null;
  } else {
    return `<a class="relative flex h-[60px] items-center justify-center bg-cover px-3 lg:h-[48px]" href="/420-countdown/">
  
          <image
              src="https://admin.zenleafdispensaries.com/wp-content/uploads/2023/03/Background-Cropped.png"
              alt="Zenleaf Countdown BG"
              class="absolute left-0 top-0 z-10 h-full w-full object-cover"
          />
          <span class="relative z-20 mr-4 text-center font-sohne text-xl leading-none text-white drop-shadow-[2px_3px_0px_rgba(79,67,134,1)] md:drop-shadow-[2px_4px_0px_rgba(79,67,134,1)]">
              THE 420 HITS START IN...
          </span>
  
          <div class="relative z-20 ml-4 flex space-x-2 sm:space-x-4 md:space-x-8">
          <div class="flex flex-col items-center justify-center md:flex-row md:space-x-3">
              <span class="flex h-[24px] w-[36px] items-center justify-center rounded-sm bg-eeire-black font-tvcd text-xs text-white lg:h-[30px] lg:w-[50px] lg:rounded xl:text-base">
              ${timeLeft[0]}
              </span>
              <span class="font-sohne text-xs uppercase lg:text-lg">Days</span>
          </div>
          <div class="flex flex-col items-center justify-center md:flex-row md:space-x-3">
              <span class="flex h-[24px] w-[36px] items-center justify-center rounded-sm bg-eeire-black font-tvcd text-xs text-white lg:h-[30px] lg:w-[50px] lg:rounded xl:text-base">
              ${timeLeft[1]}
              </span>
              <span class="font-sohne text-xs uppercase lg:text-lg">Hours</span>
          </div>
          <div class="flex flex-col items-center justify-center md:flex-row md:space-x-3">
              <span class="flex h-[24px] w-[36px] items-center justify-center rounded-sm bg-eeire-black font-tvcd text-xs text-white lg:h-[30px] lg:w-[50px] lg:rounded xl:text-base">
              ${timeLeft[2]}
              </span>
              <span class="font-sohne text-xs uppercase lg:text-lg">Mins</span>
          </div>
          <div class="flex flex-col items-center justify-center md:flex-row md:space-x-3">
              <span class="flex h-[24px] w-[36px] items-center justify-center rounded-sm bg-eeire-black font-tvcd text-xs text-white lg:h-[30px] lg:w-[50px] lg:rounded xl:text-base">
              ${timeLeft[3]}
              </span>
              <span class="font-sohne text-xs uppercase lg:text-lg">Secs</span>
          </div>
          </div>
    </a>`;
  }
};
let timeLeft = calculateTimeLeft(countDownDate);

const countdownhtml = document.createElement("div");
countdownhtml.innerHTML = '<div id="countdown"></div>';
document
  .getElementById("wrapper")
  .insertAdjacentElement("afterbegin", countdownhtml);

document.getElementById("countdown").innerHTML = template(timeLeft);

setInterval(() => {
  timeLeft = calculateTimeLeft(countDownDate);
  document.getElementById("countdown").innerHTML = template(timeLeft);
}, 1000);
