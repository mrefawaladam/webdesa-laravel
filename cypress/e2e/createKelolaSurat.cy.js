describe('Testing Halaman Create Data Kelola Surat Admin', () => {
    it('Berhasil melakukan penambahan data Kelola Surat halaman Admin', () => {
        cy.visit('http://127.0.0.1:8000/masuk')
        cy.get("input[name=email]").type('admin@gmail.com');
        cy.get("input[name=password]").type('password');
        cy.get("button").contains("Masuk").click();
        cy.visit('http://127.0.0.1:8000/surat');
        cy.contains("Tambah Surat").click();
        cy.get("input[name=nama]").type('ini nama surat');
        cy.get(':nth-child(2) > .form-group > .form-control')
        cy.get("textarea[name=deskripsi]").type('ini deskripsi surat');
        cy.get("textarea[name=persyaratan]").type('ini persyaratan surat');
        cy.get(':nth-child(11) > :nth-child(2)').click();
        cy.contains("SIMPAN").click();
    })
})