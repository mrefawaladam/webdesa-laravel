describe('Pengaturan', () => {
    it('Admin can access Pengaturan', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/pengaturan"]').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')
      })

      it('Admin can Kembali from Pengaturan', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/pengaturan"]').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')

        cy.get(':nth-child(2) > .btn').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')
      })

      it('Admin can Edit Email', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/pengaturan"]').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')

        cy.get('#email').clear()
        cy.get('#email').type('berrylradianhamesha@gmail.com')
        cy.get('form > .btn').click()

        cy.get('div').contains('Email berhasil diperbarui ')
      })

      it('Admin can Edit Password', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/pengaturan"]').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')

        cy.get('#password').type('password123')
        cy.get('#password_confirmation').type('password123')
        cy.get('#password_lama').type('password123')
        cy.get('form > .btn').click()

        cy.get('div').contains('Password berhasil diperbarui ')
      })

      it('Minimal edit 1 field', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/pengaturan"]').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')

        cy.get('#password_lama').type('password123')
        cy.get('form > .btn').click()

        cy.get('div').contains('Tidak ada perubahan yang berhasil disimpan')
      })

      it('Minimal edit 1 field', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/pengaturan"]').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')

        cy.get('#password_lama').type('password123')
        cy.get('form > .btn').click()

        cy.get('div').contains('Tidak ada perubahan yang berhasil disimpan')
      })
})
