describe('Testing Halaman hapus Data Kelola Surat Admin', () => {
    it('Berhasil melakukan penghapusan data Kelola Surat halaman Admin', () => {
        cy.visit('http://127.0.0.1:8000/masuk')
        cy.get("input[name=email]").type('admin@gmail.com');
        cy.get("input[name=password]").type('password');
        cy.get("button").contains("Masuk").click();
        cy.visit('http://127.0.0.1:8000/surat');
        cy.get(':nth-child(1) > .single-service > .btn-danger').click();
        cy.get("button").contains("Yakin").click();
    })
})