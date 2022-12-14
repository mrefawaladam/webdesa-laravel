describe('Keluar', () => {
    it('User can open pemerintahan desa', () => {
        cy.visit('localhost:8000/')

        cy.get('.dropdown > .nav-link > .nav-link-inner--text').click()
        cy.get('[href="http://localhost:8000/pemerintahan-desa"] > .nav-link-inner--text').click()
    })
  })
