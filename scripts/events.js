const createUserModal = document.getElementById("create-user-modal");
const editUserModal = document.getElementById("edit-user-modal");
const createUserButton = document.querySelector("#create-user-button");

const cancelButtons = document.querySelectorAll("button.cancel");
const deleteButtons = document.querySelectorAll("button.delete");
const editButtons = document.querySelectorAll("button.edit");
const modals = document.querySelectorAll("dialog");

const closeModals = () => modals.forEach(modal => modal.close());
const safeObjectValues = (obj) => Object.values({...(obj || {})});

const basePath = new URL(document.baseURI).pathname.replace(/[^/]+$/, '');

createUserButton.addEventListener("click", (e) => {
    e.preventDefault();
    createUserModal.showModal();
})

cancelButtons.forEach(btn => 
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        closeModals();
    })
);

deleteButtons.forEach(btn =>
    btn.addEventListener("click", (e) => {
        const playerId = e.currentTarget.getAttribute("player-id");

        fetch(`${basePath}scripts/queries/delete_player.php?id=${playerId}`)
            .then(() => location.reload())
            .catch(err => console.error(err));
    })

)

editButtons.forEach(btn => 
    btn.addEventListener("click", (e) => {
        const playerId = e.currentTarget.getAttribute("player-id");

        fetch(`${basePath}scripts/queries/get_player.php?id=${playerId}`)
            .then(res => res.json())
            .then(data => {
                const inputs = editUserModal.querySelectorAll("input");
                safeObjectValues(data).forEach((val, i) => inputs[i].value = val);
                editUserModal.showModal();
            })
            .catch(err => console.error(err));
    })
)
