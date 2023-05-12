// selecting elements
const sidebar_item = document.querySelectorAll('.sidebar_item');
const content = document.querySelector('.content');
const content_div = document.querySelector('#content_data');
const root = document.querySelector(":root")

const sidebar_right = document.querySelector(".s-right")

const title_span = document.querySelector('#title_span')

const search_input = document.getElementById("search_input_div")
const result_div = document.getElementById("result_div")

const page_home = document.querySelector("#sidebar_item-1")

const load_page_animation = document.querySelector(".page_loader")

const subpage_holder = document.querySelector("#sub_pages")
var subpages = document.querySelectorAll(".sub_page_item")

const root_url = document.querySelector("#root_url")
console.log(root_url.innerHTML)

// define global varibales
let timerId;
const delay = 700
let search_func_url = ""

// onload function
// document.addEventListener("DOMContentLoaded", function() {
//     const clickEvent = new Event("click");
//     page_home.dispatchEvent(clickEvent);
// });

// add event listner
sidebar_item.forEach(element => {
    element.addEventListener("click", () => active_sidebar_item(element))
});
// close_search_div()
// close search div
function close_search_div() {
    sidebar_right.style.visibility = 'hidden'
   
    const elementStyle = getComputedStyle(root);
    root.style.setProperty("--sidebarWidth_right", "0px");
}

// open search div
function open_search_div() {
    sidebar_right.style.visibility = 'visible'
    const elementStyle = getComputedStyle(root);
    root.style.setProperty("--sidebarWidth_right", "0px");
}

// <-------------------------subpages------------------------->
function create_subpage_item(name, param) {
    const subpage = document.createElement("div")

    if (name == "dead") {
        subpage.setAttribute("class", "sub_page_item_dead")
        subpage.innerHTML = ""
    } else {
        subpage.setAttribute("class", "sub_page_item")
        subpage.innerHTML = name
    }

    subpage.setAttribute("data-param", param)

    subpage_holder.appendChild(subpage)

    subpage.addEventListener("click", () => {
        deactivate_all_subpages()
        active_subpage(subpage)
    })
}

function active_subpage(element) {
    element.classList.add('active')
    start_load() //enable load div
    // title_span.innerHTML = element.dataset.page_name
    search_func_url = element.dataset.search_url
    load_page(element.dataset.param)
}

function deactivate_all_subpages() {
    console.log(subpages)
    subpages.forEach(subpage => {
        subpage.classList.remove('active')
    })
}

// <-------------------------subpages:END------------------------->

// <-------------------------loading animation------------------------->
function start_load() {
    load_page_animation.style.visibility = "visible"
}

function end_load() {
    load_page_animation.style.visibility = "hidden"
}
// <-------------------------loading animation:End------------------------->

function active_sidebar_item(element) {
    sidebar_item.forEach(newelement => {
        newelement.classList.remove('active')
    });
    element.classList.add('active')

    var params = element.getAttribute("data-param").split(", ")
    var pages = element.getAttribute("data-subpages").split(", ")

    title_span.innerHTML = element.innerHTML
    subpage_holder.innerHTML = ""

    if (pages.length == 1) {
        create_subpage_item("dead", params[0])
    } else {
        for (var x = 0; x < pages.length; x++) {
            create_subpage_item(pages[x], params[x])
        }
    }
    subpages = document.querySelectorAll(".sub_page_item")
    start_load()
    search_func_url = element.dataset.search_url

    if (pages.length == 1) {
        load_page(params[0])
    } else {
        const clickEvent = new Event("click")
        subpages[0].dispatchEvent(clickEvent);
    }
}

async function load_page(page_name) {
    try {
        // await delayss(2000)
        const response = await fetch(root_url.innerHTML+"/admin/" + page_name)
        const data = await response.text()
        // console.log(data)
        // history.pushState({}, page_name,"<?= ROOT ?>/admin/" + page_name);
        content_div.innerHTML = data
        end_load()

    } catch (error) {
        console.log(error);
    }
}

function delayss(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
// <-------------------------sidebar - END------------------------->

// <-------------------------search------------------------->

// add event listner for search bar
search_input.addEventListener("input", () => {
    if (search_input.value == " " || search_input.value == "") {
        search_input.value = ""
        result_div.innerHTML = ""
    } else {
        handleInput(search_input.value)
    }
})

function handleInput(keyword) {
    clearTimeout(timerId)
    timerId = setTimeout(() => {
        dynamic_search(keyword, root_url.innerHTML+"/admin/searchEvent")
    }, delay);
}
console.log("url is "+search_func_url)
async function dynamic_search(keyword, search_func_url) {
    try {
        const response = await fetch(search_func_url + "/" + keyword);
        const data = await response.json();

        if (data != 'redirect') {
            result_div.innerHTML = ""

            if (data.length > 0) {
                data.forEach(element => {
                    create_result_holder(element.name, element.location, element.date)
                    console.log(element)
                });
            } else {
                const res_div = document.createElement('div')
                res_div.classList = "text-r-1"
                res_div.innerHTML = "no result"
                result_div.appendChild(res_div)
            }
        } else {
            window.location.href = root_url.innerHTML+"/login"
        }
    } catch (error) {
        console.error(error);
    }
}
// <-------------------------search : END------------------------->

// <-------------------------search-result functions------------------------->
function create_result_holder(eventName, orgName, eventDate) {
    // create CustomElements 
    var search_result_div = document.createElement("div")
    var event_name = document.createElement("div")
    var hr_line = document.createElement("div")
    var org_name = document.createElement("div")
    var event_date = document.createElement("div")

    // add classes
    search_result_div.classList.add("search_result")
    event_name.classList.add("col-12", "w-semibold", "txt-12")
    event_name.classList.add("col-12", "w-semibold", "txt-12")
    hr_line.classList.add("h-line")
    org_name.classList.add("col-12", "w-medium", "txt-09")
    event_date.classList.add("col-12", "w-medium", "txt-09")

    // set attributes
    search_result_div.setAttribute("style", "position: relative;")
    event_name.setAttribute("style", "position: absolute;top:10px;left:15px")
    org_name.setAttribute("style", "position: absolute;top:48px;left:25px;")
    event_date.setAttribute("style", "position: absolute;top:68px;left:25px;")

    // add values
    event_name.innerHTML = eventName
    org_name.innerHTML = "Location : " + orgName
    event_date.innerHTML = "Event date : " + eventDate

    // assemble
    result_div.appendChild(search_result_div)
    search_result_div.appendChild(event_name)
    search_result_div.appendChild(hr_line)
    search_result_div.appendChild(org_name)
    search_result_div.appendChild(event_date)

    // result_div.appendChild(search_result_div)
}
// create_result_holder("eventName", "OrgName", "eventDate")
// <-------------------------search-result functions : End------------------------->