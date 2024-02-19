const URL =
  "http://localhost:6060/BackEnd/S3/L4/wordpress/index.php/wp-json/wp/v2/";

console.log(document.location.pathname);
if (document.location.pathname.includes("/post.html")) {
  //single post
} else if (document.location.pathname.includes("/users.html")) {
  document
    .querySelector("header")
    .appendChild(document.createElement("button")).innerText = "add user";

  document.querySelector("button").addEventListener("click", () => {
    fetch(URL + "users", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",

        Authorization: "Basic",
      },
      body: JSON.stringify({
        name: "test",
        email: "fest@test.com",
        username: "test",
        password: "test",
      }),
    });
  });
  fetch(URL + "users")
    .then((response) => response.json())
    .then((json) => {
      console.log(json);
      document.querySelector("main").innerHTML = json.map((user) => {
        return `<article>
            <h2>${user.name}</h2>
            <img src="${user.avatar_urls[96]}" alt="${user.name}">
            </article>`;
      });
    });
} else {
  fetch(URL + "posts")
    .then((response) => response.json())
    .then((json) => {
      console.log(json);
      document.querySelector("main").innerHTML = json.map((post) => {
        return `<article>
              <h2>${post.title.rendered}</h2>
              <p>${post.content.rendered}</p>
              </article>`;
      });
    });
  //home
}
