export class Controller {
  public static async create(req: Request, res: Response) {
    // Validate request
    if (!req.body.title) {
      res.status(400).send({ message: 'Content can not be empty!' })
      return
    }

    res.send({ result: 'OK' })
  }

  public static async findAll(req: Request, res: Response) {
    //const titlereq.query.title

    res.send({ result: 'findall OK' })
  }

  public static async findOne(req: Request, res: Response) {
    //const idreq.params.id

    res.status(404).send({ message: "Couldn't find anything" })
  }

  public static async update(req: Request, res: Response) {
    if (!req.body) {
      return res.status(400).send({
        message: 'Data to update can not be empty!',
      })
    }
    res.send({ result: 'OK' })
  }

  public static async deleteItem(req: Request, res: Response) {
    //const idreq.params.id

    res.send({ result: 'OK' })
  }
}
