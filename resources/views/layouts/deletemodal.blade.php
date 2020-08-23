            <!-- Delete Reply Button Modal HTML -->
            <div id="deleteModal" class="modal fade delete-modal">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                              <i class="fas fa-trash"> Are you sure?</i>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete this? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('articles.delete', ['article' => $article->id])}}" method="POST">
                                <input value="Delete" type="submit" class="btn btn-danger">
                                @method('DELETE')
                                @CSRF
                            </form>
                            <a type="button" class="btn btn-info" data-dismiss="modal">
                              <i class="fas fa-window-close"> Cancel</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
