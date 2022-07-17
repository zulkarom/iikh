/*===================
18. Theme Setting js
=======================*/

const root = document.querySelector(":root");
const css = getComputedStyle(body);
const bodyThemeColor = css.getPropertyValue('--theme-color');

const themeSettingMarkup = `
<!-- Theme Setting Star -->
<div class="theme-controller">
    <div class="color-picker">
           <input type="color" class="form-control form-control-color" id="ColorPicker1" value="${bodyThemeColor.trim()}" title="Choose your color" />
    </div>

    <div class="light-dark-box">
            <button id="dark-btn" class="btnTheme"><i data-feather="moon"></i> <span class="text-value">Dark</span></button>
            <button id="rtl-btn" class="btnTheme "><i data-feather="repeat"></i> <span class="text-value">Rtl</span></button>
    </div>
</div>
<!-- Theme Setting End -->  
`;

body.insertAdjacentHTML("afterbegin", themeSettingMarkup);
const themeBtnParent = document.querySelector(".light-dark-box");

const rtlBtn = document.querySelector("#rtl-btn");
const darkBtn = document.querySelector("#dark-btn");
const html = document.querySelector("html");
const rtlLink = document.querySelector("#rtl-link");
const darkLink = document.querySelector("#change-link");



/// Color Picker ///
const color_picker1 = document.querySelector("#ColorPicker1");
color_picker1?.addEventListener("change", function () {
    color_picker1.value = this.value;
    document.body.style.setProperty("--theme-color", color_picker1.value);

});



const activeRemoveFn = function (elList) {
    elList.forEach(el => {
        el.classList.remove("active");
    })
}

themeBtnParent?.addEventListener("click", function (e) {
    e.preventDefault();
    const clicked = e.target.closest(".btnTheme")?.id;
    if (!clicked) return;
    if (clicked === "rtl-btn") {
        rtlBtn.id = "ltr-btn";
        feather.replace();
        rtlBtn.querySelector(".text-value").textContent = "Ltr"
        html.setAttribute("dir", "rtl")
        rtlLink.href = "../assets/css/vendors/bootstrap.rtl.css";
        rtlBtn.classList.add("rtlBtnEl")
        localStorage.setItem('rtlcss', '../assets/css/vendors/bootstrap.rtl.css');
        localStorage.setItem('dir', 'rtl');
        localStorage.setItem('rtlBtnId', 'ltr-btn');
        localStorage.setItem('textContentRtl', 'Ltr');
    }
    if (clicked === "ltr-btn") {
        rtlBtn.id = "rtl-btn"
        feather.replace();
        rtlBtn.querySelector(".text-value").textContent = "Rtl"
        html.setAttribute("dir", "")
        rtlLink.href = "../assets/css/vendors/bootstrap.css";
        localStorage.setItem('rtlcss', '../assets/css/vendors/bootstrap.css');
        localStorage.setItem('dir', '');
        localStorage.setItem('rtlBtnId', 'rtl-btn');
        localStorage.setItem('textContentRtl', ' Rtl');
    }
    if (clicked === "dark-btn") {
        darkBtn.id = "light-btn"
        darkBtn.innerHTML = `<i data-feather="sun"></i> <span class="text-value">Light</span>`
        feather.replace();
        html.className = "dark"
        darkLink.href = "../assets/css/dark.css";
        localStorage.setItem("body", "dark")
        localStorage.setItem('layoutcss', '../assets/css/dark.css');
        localStorage.setItem('darkId', 'light-btn');
        localStorage.setItem('textContentDark', `<i data-feather="sun"></i> <span class="text-value">Light</span>`);
    }
    if (clicked === "light-btn") {
        darkBtn.id = "dark-btn"
        darkBtn.innerHTML = `<i data-feather="moon"></i> <span class="text-value">Dark</span>`
        feather.replace();
        darkLink.href = "../assets/css/style.css";
        html.className = " "
        localStorage.setItem("body", " ");
        localStorage.setItem('layoutcss', '../assets/css/style.css');
        localStorage.setItem('darkId', 'dark-btn');
        localStorage.setItem('textContentDark', `<i data-feather="moon"></i> <span class="text-value">Dark</span>`);
    }
})

// Rtl 
rtlBtn.id = localStorage.getItem("rtlBtnId") ? localStorage.getItem("rtlBtnId") : "rtl-btn";
rtlBtn.querySelector(".text-value").textContent = localStorage.getItem("textContentRtl") ? localStorage.getItem("textContentRtl") : "Rtl";
html.setAttribute("dir", localStorage.getItem("dir"));
rtlLink.href = localStorage.getItem('rtlcss') ? localStorage.getItem('rtlcss') : '../assets/css/vendors/bootstrap.css';

// Dark 
darkBtn.id = localStorage.getItem("darkId") ? localStorage.getItem("darkId") : "dark-btn";
darkBtn.innerHTML = localStorage.getItem("textContentDark") ? localStorage.getItem("textContentDark") : `<i data-feather="moon"></i> <span class="text-value">Dark</span>`;
html.className = localStorage.getItem("body")
if (darkLink) {
    darkLink.href = localStorage.getItem('layoutcss') ? localStorage.getItem('layoutcss') : '../assets/css/style.css';
}


/// Bootstrap Tool Tip ///
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

feather.replace();