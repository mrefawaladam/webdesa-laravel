describe('Profil Saya', () => {
    it('Admin can access Profil Saya', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/profil"]').click()
        cy.url().should('contain', 'http://localhost:8000/profil')
      })

    it('Admin can edit Akun Saya', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/profil"]').click()
        cy.url().should('contain', 'http://localhost:8000/profil')

        cy.get('#input-nama').clear()
        cy.get('#input-nama').type('Berryl Radian Hamesha')
        cy.get('form > .btn').click()

        cy.get('div').contains('Profil berhasil di perbarui')
      })

      it('Admin can Ganti Foto', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/profil"]').click()
        cy.url().should('contain', 'http://localhost:8000/profil')

        cy.get('a').contains('Ganti').click()
        cy.url().should('contain', 'http://localhost:8000/profil#input-foto_profil')
      })

      it('Admin can edit Email', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/profil"]').click()
        cy.url().should('contain', 'http://localhost:8000/profil')

        cy.get('.badge').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')
      })

      it('Admin can open Pengaturan', () => {
        cy.visit('http://localhost:8000/masuk')

        cy.get('input[name=email]').type('admin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Masuk').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-nav > .nav-item > .nav-link > .media > .avatar > img').click()

        cy.get('.navbar-nav > .nav-item > .dropdown-menu > [href="http://localhost:8000/profil"]').click()
        cy.url().should('contain', 'http://localhost:8000/profil')

        cy.get('.col-4 > .btn').click()
        cy.url().should('contain', 'http://localhost:8000/pengaturan')
      })
})
