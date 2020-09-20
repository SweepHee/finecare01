const $logout = document.getElementById("logout");
if ($logout instanceof HTMLElement) {
    $logout.addEventListener("click", () => {
        fetch("/auth/logout", { method: "post" }).then(() => window.location.reload());
    })
}

const $readmore = document.getElementById("readmore");
if ($readmore instanceof HTMLElement) {
    let page = 0;
    $readmore.addEventListener("click", () => fetch("/page=" + ++page, { method: "get"}).then( async response => {

        const parser = new DOMParser();
        const doc = parser.parseFromString(await response.text(), "text/html");
        const list = doc.querySelectorAll(".uk-container > .uk-list > li");
        if (list.length > 0) {
            Array.from(list).forEach(Item => {
                document.querySelector(".uk-container > .uk-list").appendChild(Item);
            })
        }
    }))
}