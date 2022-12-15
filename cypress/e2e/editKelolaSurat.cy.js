describe('Testing Halaman Edit Data Kelola Surat Admin', () => {
    it('Berhasil melakukan pengeditan data Kelola Surat halaman Admin', () => {
        cy.visit('http://127.0.0.1:8000/masuk')
        cy.get("input[name=email]").type('admin@gmail.com');
        cy.get("input[name=password]").type('password');
        cy.get("button").contains("Masuk").click();
        cy.visit('http://127.0.0.1:8000/surat');
        cy.visit('http://127.0.0.1:8000/surat/2/edit');
        cy.get("input[name=nama]").clear();
        cy.get("input[name=nama]").type('ini nama surat edit');
        cy.get("textarea[name=deskripsi]").clear();
        cy.get("textarea[name=deskripsi]").type('ini deskripsi surat edit');
        cy.get("textarea[name=persyaratan]").clear();
        cy.get("textarea[name=persyaratan]").type('ini persyaratan surat edit');
        cy.contains("SIMPAN").click();
    })
})