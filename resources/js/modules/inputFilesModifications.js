export default () => {
    const files = document.querySelectorAll('.file-modification')

    if (!files) return

    files.forEach(file => {
        const input = file.querySelector('.modification-input')
        const label = file.querySelector(`label[for='${input.id}']`)

        input.onchange = () => {
            console.log(input.files.length)
            if (input.files.length !== 0) {
                label.style.backgroundColor = 'rgb(34 197 94 / var(--tw-bg-opacity))'
            } else {
                label.style.backgroundColor = 'rgb(59 130 246 / var(--tw-bg-opacity))'
            }
        }
    })
}
