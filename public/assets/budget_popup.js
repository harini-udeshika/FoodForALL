const popup_div = document.getElementById('popup-div')
const popup_close_btn = document.getElementById('popup-close-btn')
const popup_msg = document.getElementById('popup-message')
const popup_body = document.getElementById('popup-body')
const popup_heading = document.getElementById('popup-head')
const popup_button = document.getElementById('popup_delete_btn')
const popup_form = document.getElementById('popup_form')
const popup_hero_btn = document.getElementById('popup-hero-btn')
const popup_form_span = document.getElementById('popup_form_span') 
const form_button = document.getElementById('form_button')

popup_close_btn.addEventListener("click", close_popup)

function create_message(message, icon){
    const msg_div = document.createElement('div')
    const icon_i = document.createElement('i')

    msg_div.setAttribute("class",)
}

function set_approve(budget_id){
    popup_msg.style.display = 'block'
    popup_hero_btn.style.display = 'block'
    popup_button.style.display = 'block'

    popup_heading.innerHTML = "Approve Budget"
    popup_msg.innerHTML = "Are you sure you want to approve the budget?"
    popup_button.innerHTML = "Approve"
    popup_form.style.display = 'none'

    // popup_button.setAttribute("class","")

    // popup_button.addEventListener("click",()=>{
    //     approve_budget(budget_id)
    // })

    open_popup()
}

function set_reject(budget_id){
    popup_form.style.display = 'block'

    popup_heading.innerHTML = "Reject Budget"
    popup_form_span.innerHTML = "reject"
    popup_msg.style.display = 'none'
    popup_hero_btn.style.display = 'none'
    
    popup_button.style.display = 'none'
    form_button.innerHTML = "Reject Budget"

    // popup_button.addEventListener("click",()=>{
    //     approve_budget(budget_id)
    // })

    open_popup()
}

function set_modify(budget_id){
    popup_form.style.display = 'block'

    popup_heading.innerHTML = "Requst to Modify Budget"
    popup_form_span.innerHTML = "Modify"
    popup_msg.style.display = 'none'
    popup_hero_btn.style.display = 'none'
    
    popup_button.style.display = 'none'
    form_button.innerHTML = "Send Request"

    // popup_button.addEventListener("click",()=>{
    //     approve_budget(budget_id)
    // })

    open_popup()
}

function open_popup(package_id) {
    popup_div.style.visibility = 'visible'
}

function close_popup() {
    popup_div.style.visibility = 'hidden'
}