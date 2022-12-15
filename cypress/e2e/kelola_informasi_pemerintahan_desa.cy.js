describe('Kelola Informasi Pemerinthan Desa', () => {
    it('Admin can open kelola pemerintahan desa', () => {
        cy.visit('localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()

        cy.url().should('contain', 'http://localhost:8000/dashboard')
        cy.get('a').contains('Kelola Informasi Pemerintahan Desa').click()
        cy.url().should('contain', 'http://localhost:8000/kelola-pemerintahan-desa')
    })

    it('Admin can add informasi pemerintahan desa', () => {
        cy.visit('localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()

        cy.url().should('contain', 'http://localhost:8000/dashboard')
        cy.get('a').contains('Kelola Informasi Pemerintahan Desa').click()
        cy.url().should('contain', 'http://localhost:8000/kelola-pemerintahan-desa')

        cy.get('a').contains('Tambah Informasi Pemerintahan Desa').click()
        cy.get('input[name=gambar]').selectFile('cypress/fixtures/dana.png')
        cy.get(':nth-child(3) > .form-control').type('Ini adalah judul')
        cy.get('.note-editable').type('Ini adalah konten')

        cy.get('#simpan').click()
    })

    it('Admin can edit informasi pemerintahan desa', () => {
        cy.visit('localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()

        cy.url().should('contain', 'http://localhost:8000/dashboard')
        cy.get('a').contains('Kelola Informasi Pemerintahan Desa').click()
        cy.url().should('contain', 'http://localhost:8000/kelola-pemerintahan-desa')

        cy.get('.card-body > :nth-child(2) > .btn-success').first().click()
        cy.get(':nth-child(4) > .form-control').clear()
        cy.get(':nth-child(4) > .form-control').type('Edit ini adalah judul')
        cy.get('.note-editable').clear()
        cy.get('.note-editable').type('Edit ini adalah konten')

        cy.get('#simpan').click()
    })

    it('Admin can delete informasi pemerintahan desa', () => {
        cy.visit('localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()

        cy.url().should('contain', 'http://localhost:8000/dashboard')
        cy.get('a').contains('Kelola Informasi Pemerintahan Desa').click()
        cy.url().should('contain', 'http://localhost:8000/kelola-pemerintahan-desa')

        cy.get('.btn-danger').first().click()

        cy.get('#form-hapus > .btn').click()
    })

  })
