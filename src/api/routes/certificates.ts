import { Router } from 'express'
const router = Router()

import { Controller } from '../controllers/certificates.ts'

const entity = 'certificate'

router.post('/' + entity, Controller.create)

router.get('/' + entity, Controller.findAll)

router.get('/' + entity + '/:id', Controller.findOne)

router.put('/' + entity + '/:id', Controller.update)

router.delete('/' + entity + '/:id', Controller.deleteItem)

export default router
