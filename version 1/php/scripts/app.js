const cityForm = document.querySelector('.change-location');
const card = document.querySelector('.card');
const details = document.querySelector('.details');
const time = document.querySelector('img.time');
const icon = document.querySelector('.icon img');

const updateUI=data=>{
    console.log(data);
    // const cityDets = data.cityDets;
    // const weather = data.weather;

    //destructure properties
    const {cityDets,weather}=data;

    //update templates
    details.innerHTML=`
    <h5 class="my-3">${cityDets.EnglishName}</h5>
    <h6 class="my-2">${cityDets.Country.EnglishName},${cityDets.AdministrativeArea.EnglishName}</h2>
    <i class="my-1">Latitude:${cityDets.GeoPosition.Latitude}    Longitude:${cityDets.GeoPosition.Longitude}</i>
    <div class="my-3">${weather.WeatherText}</div>
    <div class="display-4 my-4">
        <span>${weather.Temperature.Metric.Value}</span>
        <span>&deg;C</span>
    </div>
    `;
    //update the night/day icon and images
    const iconSrc = `img/icons/${weather.WeatherIcon}.svg`;
    icon.setAttribute('src',iconSrc);

    // let timeSrc = null;
    // if(weather.IsDayTime){
    //     timeSrc = 'img/day.svg';
    // }
    // else{
    //     timeSrc = 'img/night.svg';
    // }
    let timeSrc = weather.IsDayTime ? 'img/day.svg': 'img/night.svg';

    time.setAttribute('src',timeSrc);

    //remove d-none class
    if(card.classList.contains('d-none')){
        card.classList.remove('d-none');
    }
    
};

const updateCity = async(city)=>{
    const cityDets = await getCity(city);
    const weather = await getWeather(cityDets.Key);
    return {cityDets,weather};//cityDets:cityDets,weather:weather
        
};

cityForm.addEventListener('submit',e=>{
    e.preventDefault();
    //get city
    const city = cityForm.city.value.trim();
    cityForm.reset();
    //update the ui with the new data
    updateCity(city)
    .then(data=>updateUI(data))
    .catch(err => console.log(err));

});
